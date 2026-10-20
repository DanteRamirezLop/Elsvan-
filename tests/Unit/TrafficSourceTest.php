<?php

namespace Tests\Unit;

use App\Support\TrafficSource;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TrafficSourceTest extends TestCase
{
    public static function trackingProvider(): array
    {
        return [
            'google ads con UTMs' => [['utm_source' => 'google', 'utm_medium' => 'cpc'], TrafficSource::GOOGLE_ADS, 'google', 'cpc'],
            'google ads solo gclid' => [['gclid' => 'abc'], TrafficSource::GOOGLE_ADS, 'google', 'cpc'],
            'google ads iOS (gbraid)' => [['gbraid' => 'abc', 'referrer' => 'google.com'], TrafficSource::GOOGLE_ADS, 'google', 'cpc'],
            'facebook ads' => [['utm_source' => 'fb', 'utm_medium' => 'paid_social'], TrafficSource::FACEBOOK_ADS, 'fb', 'paid_social'],
            'instagram ads' => [['utm_source' => 'instagram', 'utm_medium' => 'cpc'], TrafficSource::INSTAGRAM_ADS, 'instagram', 'cpc'],
            'post orgánico etiquetado' => [['utm_source' => 'instagram', 'utm_medium' => 'social'], TrafficSource::CAMPAIGN, 'instagram', 'social'],
            'email' => [['utm_source' => 'newsletter', 'utm_medium' => 'email'], TrafficSource::CAMPAIGN, 'newsletter', 'email'],
            'búsqueda google' => [['referrer' => 'google.com.pe'], TrafficSource::ORGANIC_SEARCH, 'google', 'organic'],
            'app de google android' => [['referrer' => 'com.google.android.googlequicksearchbox'], TrafficSource::ORGANIC_SEARCH, 'google', 'organic'],
            'búsqueda bing' => [['referrer' => 'bing.com'], TrafficSource::ORGANIC_SEARCH, 'bing', 'organic'],
            'instagram orgánico' => [['referrer' => 'l.instagram.com', 'fbclid' => 'x'], TrafficSource::ORGANIC_SOCIAL, 'instagram', 'social'],
            'facebook orgánico' => [['referrer' => 'm.facebook.com'], TrafficSource::ORGANIC_SOCIAL, 'facebook', 'social'],
            'fbclid sin referrer' => [['fbclid' => 'x'], TrafficSource::ORGANIC_SOCIAL, 'facebook', 'social'],
            'otro sitio' => [['referrer' => 'urbania.pe'], TrafficSource::REFERRAL, 'urbania.pe', 'referral'],
            'directo' => [[], TrafficSource::DIRECT, 'direct', 'none'],
        ];
    }

    #[DataProvider('trackingProvider')]
    public function test_classifies_traffic(array $tracking, string $channel, string $source, string $medium): void
    {
        $traffic = TrafficSource::fromTracking($tracking);

        $this->assertSame($channel, $traffic->channel);
        $this->assertSame($source, $traffic->source);
        $this->assertSame($medium, $traffic->medium);
    }
}
