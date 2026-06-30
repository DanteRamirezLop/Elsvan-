<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class PageController extends Controller
{
    public function termsandconditions(){
        $dominio = config('app.url');
        $data['seo'] = array(
            'title'         => 'Términos y condiciones | Inmobiliaria en lima',
            'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
            'keywords'      => 'Inmobiliaria, departamentos, Lima',
            'image'         => $dominio.'/images/logo-seo.png',
        );
        return view('termsandconditions',$data);
    }

    public function complaintsbook(){
        $dominio = config('app.url');
        $data['seo'] = array(
            'title'         => 'Libro de reclamaciones | Inmobiliaria en lima',
            'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
            'keywords'      => 'Inmobiliaria, departamentos, Lima',
            'image'         => $dominio.'/images/logo-seo.png',
        );

        //  $libro = Claim::latest()->first();
        //  if($libro){
        //      $number = $libro->id;
        //  }else{
        //      $number =0;
        //  }
        $data['number'] =0;
        $data['anioActual'] = Carbon::now()->year;
        $data['fechaActual'] = Carbon::now()->format('d/m/Y');

        return view('complaintsbook',$data);
    }
}
