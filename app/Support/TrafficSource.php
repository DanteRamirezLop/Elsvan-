<?php

namespace App\Support;

/**
 * Clasifica de dónde vino un lead a partir de los UTMs, los identificadores de clic
 * (gclid, fbclid...) y el sitio de procedencia (referrer) guardados al llegar a la web.
 */
final class TrafficSource
{
    public const GOOGLE_ADS = 'google_ads';

    public const FACEBOOK_ADS = 'facebook_ads';

    public const INSTAGRAM_ADS = 'instagram_ads';

    public const CAMPAIGN = 'campaign';

    public const ORGANIC_SEARCH = 'organic_search';

    public const ORGANIC_SOCIAL = 'organic_social';

    public const REFERRAL = 'referral';

    public const DIRECT = 'direct';

    // Valores de utm_medium que indican tráfico pagado
    protected const PAID_MEDIUMS = [
        'cpc', 'ppc', 'cpm', 'cpa', 'paid', 'ads', 'display',
        'paidsearch', 'paid_search', 'paid-search',
        'paidsocial', 'paid_social', 'paid-social',
    ];

    // Valores de utm_source de Meta; fb/ig/msg/an son los que genera {{site_source_name}}
    protected const META_SOURCES = ['facebook', 'fb', 'instagram', 'ig', 'meta', 'messenger', 'msg', 'an', 'audience_network'];

    protected const SEARCH_ENGINES = [
        'google' => '/(^|\.)google\.[a-z.]+$|googlequicksearchbox/',
        'bing' => '/(^|\.)bing\.com$/',
        'yahoo' => '/(^|\.)yahoo\.[a-z.]+$/',
        'duckduckgo' => '/(^|\.)duckduckgo\.com$/',
        'ecosia' => '/(^|\.)ecosia\.org$/',
        'yandex' => '/(^|\.)yandex\.[a-z.]+$/',
    ];

    protected const SOCIAL_NETWORKS = [
        'facebook' => ['facebook.com', 'fb.com', 'fb.me'],
        'instagram' => ['instagram.com'],
        'tiktok' => ['tiktok.com'],
        'youtube' => ['youtube.com', 'youtu.be'],
        'linkedin' => ['linkedin.com', 'lnkd.in'],
        'twitter' => ['twitter.com', 'x.com', 't.co'],
        'whatsapp' => ['whatsapp.com', 'wa.me'],
        'pinterest' => ['pinterest.com', 'pin.it'],
    ];

    protected function __construct(
        public readonly string $channel,
        public readonly string $source,
        public readonly string $medium,
        public readonly string $label,
    ) {}

    /**
     * @param  array<string, string>  $tracking  utm_*, gclid, gbraid, wbraid, fbclid, referrer
     */
    public static function fromTracking(array $tracking): self
    {
        $utmSource = $tracking['utm_source'] ?? null;
        $utmMedium = $tracking['utm_medium'] ?? null;
        $source = strtolower((string) $utmSource);
        $isPaid = in_array(strtolower((string) $utmMedium), self::PAID_MEDIUMS, true);

        // Google Ads: el auto-etiquetado agrega gclid (o gbraid/wbraid en iOS) aunque no haya UTMs
        if (filled($tracking['gclid'] ?? null) || filled($tracking['gbraid'] ?? null) || filled($tracking['wbraid'] ?? null)
            || ($source === 'google' && $isPaid)) {
            return new self(self::GOOGLE_ADS, $utmSource ?: 'google', $utmMedium ?: 'cpc', 'Google Ads');
        }

        // Meta Ads: fbclid también aparece en publicaciones orgánicas, por eso se exigen UTMs de pago
        if (in_array($source, self::META_SOURCES, true) && $isPaid) {
            return in_array($source, ['instagram', 'ig'], true)
                ? new self(self::INSTAGRAM_ADS, $utmSource, $utmMedium, 'Instagram Ads')
                : new self(self::FACEBOOK_ADS, $utmSource, $utmMedium, 'Facebook Ads');
        }

        // Cualquier otro enlace etiquetado (email, post orgánico etiquetado, otra plataforma...)
        if (filled($utmSource)) {
            return new self(self::CAMPAIGN, $utmSource, $utmMedium ?: 'referral', 'Campaña ('.$utmSource.' / '.($utmMedium ?: 'sin medio').')');
        }

        $referrer = strtolower((string) ($tracking['referrer'] ?? ''));

        if ($referrer !== '') {
            foreach (self::SEARCH_ENGINES as $engine => $pattern) {
                if (preg_match($pattern, $referrer)) {
                    return new self(self::ORGANIC_SEARCH, $engine, 'organic', 'Orgánico - Búsqueda en '.ucfirst($engine));
                }
            }

            if ($network = self::socialNetwork($referrer)) {
                return new self(self::ORGANIC_SOCIAL, $network, 'social', 'Orgánico - Redes sociales ('.ucfirst($network).')');
            }

            return new self(self::REFERRAL, $referrer, 'referral', 'Referido desde '.$referrer);
        }

        // Los navegadores internos de Facebook/Instagram a veces no envían referrer, pero sí fbclid
        if (filled($tracking['fbclid'] ?? null)) {
            return new self(self::ORGANIC_SOCIAL, 'facebook', 'social', 'Orgánico - Redes sociales (Facebook/Instagram)');
        }

        return new self(self::DIRECT, 'direct', 'none', 'Directo (sin origen identificable)');
    }

    public function isPaid(): bool
    {
        return in_array($this->channel, [self::GOOGLE_ADS, self::FACEBOOK_ADS, self::INSTAGRAM_ADS], true);
    }

    protected static function socialNetwork(string $host): ?string
    {
        foreach (self::SOCIAL_NETWORKS as $network => $domains) {
            foreach ($domains as $domain) {
                if ($host === $domain || str_ends_with($host, '.'.$domain)) {
                    return $network;
                }
            }
        }

        return null;
    }
}
