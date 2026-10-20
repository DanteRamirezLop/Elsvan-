<?php

namespace App\Http\Middleware;

use App\Support\TrafficSource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

/**
 * Guarda cómo llegó el usuario al sitio (UTMs, identificadores de clic y sitio de procedencia)
 * para enviarlo a Sperant cuando complete un formulario en otra página o más tarde.
 *
 * @see TrafficSource para la clasificación
 */
class CaptureUtmParameters
{
    public const COOKIE = 'utm';

    // gbraid/wbraid: Google Ads los usa en lugar de gclid en tráfico de iOS; fbclid lo agrega Meta
    public const KEYS = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'gbraid', 'wbraid', 'fbclid'];

    // 30 días, en minutos
    public const LIFETIME = 60 * 24 * 30;

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET')) {
            $tracking = self::clean($request->query());
            $referrer = self::externalReferrer($request);

            if ($tracking !== []) {
                // Una visita desde una campaña reemplaza por completo a la anterior (último clic)
                Cookie::queue(self::COOKIE, json_encode(array_filter([...$tracking, 'referrer' => $referrer])), self::LIFETIME);
            } elseif ($referrer !== null && ! $request->hasCookie(self::COOKIE)) {
                // Una visita orgánica solo se guarda si no había una anterior: no pisa a una campaña
                Cookie::queue(self::COOKIE, json_encode(['referrer' => $referrer]), self::LIFETIME);
            }
        }

        return $next($request);
    }

    /**
     * Datos de origen guardados para el visitante actual.
     */
    public static function fromRequest(Request $request): array
    {
        $stored = json_decode((string) $request->cookie(self::COOKIE), true);

        return is_array($stored) ? self::clean($stored, [...self::KEYS, 'referrer']) : [];
    }

    /**
     * Dominio del sitio desde el que llegó el usuario, si no es este mismo sitio.
     */
    protected static function externalReferrer(Request $request): ?string
    {
        $host = parse_url((string) $request->headers->get('referer'), PHP_URL_HOST);

        if (! is_string($host) || $host === '') {
            return null;
        }

        $host = preg_replace('/^www\./', '', strtolower($host));

        return $host === preg_replace('/^www\./', '', strtolower($request->getHost()))
            ? null
            : mb_substr($host, 0, 150);
    }

    protected static function clean(array $values, array $keys = self::KEYS): array
    {
        return collect($values)
            ->only($keys)
            ->filter(fn ($value) => is_string($value) && trim($value) !== '')
            ->map(fn ($value) => mb_substr(trim($value), 0, 150))
            ->all();
    }
}
