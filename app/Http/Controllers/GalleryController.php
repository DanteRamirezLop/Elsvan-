<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
     public function index(){

        $dominio = config('app.url');
        $page = Page::where('title','galeria')->first();
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/images/logo-seo.png',
            );

        }else{
            $data['seo'] = array(
                'title'         => 'Galeria | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }
        $data['images'] = GalleryImage::where('is_active',1)->paginate(6);


        return view('gallery', $data);
    }
}
