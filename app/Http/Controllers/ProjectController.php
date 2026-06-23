<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\RealEstateProject;

class ProjectController extends Controller
{
    public function index(){

        $projects = RealEstateProject::where('status','published')->paginate(9);
        $data['projects'] = $projects;

        $dominio = config('app.url');
        $page = Page::where('title','projects')->first();
        if($page){
            $data['seo'] = array(
                'title'         => $page->title,
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

    public function show(){
        return view('projects.show');
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
}
