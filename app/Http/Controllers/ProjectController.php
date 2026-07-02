<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\RealEstateProject;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function index(){

        $projects = RealEstateProject::where('status','published')->paginate(9);
        $data['projects'] = $projects;

        $dominio = config('app.url');
        $page = Page::where('title','projects')->first();
        //SEO
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/uploads/cms/'.$page->feature_image,
            );

        }else{
            $data['seo'] = array(
                'title'         => 'Proyectos | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }

        return view('projects.index', $data);
    }

    public function show(RealEstateProject $project){
        $data['project'] = $project;
        $title = $this->limpiarTitulo($project->name);
        //SEO
        $data['seo'] = array(
            'title'         => $title.' | Elsvan Inmobiliaria',
            'description'   => $project->description,
            'keywords'      => $project->tag.','.$project->name,
            'image'         => $project->main_image ? Storage::disk('public')->url($project->main_image) : '',
        );

        return view('projects.show',$data);
    }

     public function brochure(){
        //$filename = str_replace(' ', '-', $name);
        //$url = config('services.trading.url') . '/uploads/media/' . $file;
        $url = '';
        $response = Http::get($url);
        return response($response->body(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '.pdf"');
    }

     private function limpiarTitulo($titulo)
    {
        // Eliminar caracteres no permitidos
        // Se permiten letras, números, tildes, ñ, espacios, /, ¿ y ?
        $titulo = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s\/¿\?]/u', '', $titulo);

        // Reemplazar múltiples espacios por uno solo
        $titulo = preg_replace('/\s+/', ' ', $titulo);

        // Quitar espacios al inicio y final
        return trim($titulo);
    }
}
