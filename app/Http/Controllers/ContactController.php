<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function index(){
        $dominio = config('app.url');
        $page = Page::where('title','contact')->first();
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/uploads/cms/'.$page->feature_image,
            );

        }else{
            $data['seo'] = array(
                'title'         => 'Galeria | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }

        return view('contact',$data);
    }
}
