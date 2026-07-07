<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Page;
use App\Models\RealEstateProject;

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
                'title'         => 'Contactanos | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }

        return view('contact',$data);
    }


    public function quote(){
        $dominio = config('app.url');
        $page = Page::where('title','quote')->first();
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/uploads/cms/'.$page->feature_image,
            );

        }else{
            $data['seo'] = array(
                'title'         => 'Cotizar | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }

        $data['project'] = RealEstateProject::first();

        return view('quote',$data);
    }

    public function send(Request $request)
    {
        try {

            $validated = $request->validate([
                'nombres'   => ['required', 'string', 'max:100'],
                'apellidos' => ['required', 'string', 'max:100'],
                'celular'   => ['required', 'string', 'max:30'],
                'correo'    => ['required', 'email', 'max:150'],
                'solicitud' => ['required', 'string', 'max:2000'],
            ]);

            Mail::to(config('mail.contact_to'))->send(new ContactFormMail($validated));

            return response()->json([
                'status'  => true,
                'message' => 'Tu consulta fue enviada correctamente. Nos pondremos en contacto contigo pronto.',
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'status'  => false,
                'message' => 'Ocurrio un error',
            ]);
        }

    }
}
