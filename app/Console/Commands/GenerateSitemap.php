<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;
use App\Models\RealEstateProject;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generar sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postsitmap = Sitemap::create();
        //Rutas estaticas
        $postsitmap->add(
            Url::create("/")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );
        $postsitmap->add(
            Url::create("/nosotros")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $postsitmap->add(
            Url::create("/galeria")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $postsitmap->add(
            Url::create("/contactanos")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

         $postsitmap->add(
            Url::create("/cotizar")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $postsitmap->add(
            Url::create("/proyectos")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );
        //Rutas de proyectos
        RealEstateProject::get()->each(function (RealEstateProject $project) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/proyectos/{$project->slug}")
                    ->setLastModificationDate(Carbon::create($project->created_at))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        $postsitmap->add(
            Url::create("/noticias")
                ->setLastModificationDate(Carbon::create('2026', '7', '7'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        //Rutas de noticias
        Article::get()->each(function (Article $article) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/noticias/{$article->slug}")
                    ->setLastModificationDate(Carbon::create($article->created_at))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}
