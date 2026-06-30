<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\GalleryImage;

class AboutusController extends Controller
{
     public function index(){
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
                'title'         => 'Nosotros | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }
         $data['images'] = GalleryImage::where('is_active',1)->limit(10)->get();
        return view('about-us',$data);
    }
}
