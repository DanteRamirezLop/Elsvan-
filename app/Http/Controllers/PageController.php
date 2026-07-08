<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\ClaimFormMail;
use App\Models\Page;
use App\Models\Claim;


class PageController extends Controller
{
    public function termsandconditions(){

        $dominio = config('app.url');
        $page = Page::where('title','terminos')->first();
        $data['page'] = $page;
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/images/logo-seo.png',
            );

        }else{
            $data['seo'] = array(
            'title'         => 'Términos y condiciones | Elsvan construcciones inmobiliarias',
            'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
            'keywords'      => 'Inmobiliaria, departamentos, Lima',
            'image'         => $dominio.'/images/logo-seo.png',
            );
        }


        return view('termsandconditions',$data);
    }

    public function privacypolicies(){

        $dominio = config('app.url');
        $page = Page::where('title','politicas')->first();
        $data['page'] = $page;
        if($page){
            $data['seo'] = array(
                'title'         => $page->meta_title,
                'description'   => $page->meta_description,
                'keywords'      => $page->tags,
                'image'         => $dominio.'/images/logo-seo.png',
            );

        }else{
            $data['seo'] = array(
            'title'         => 'Políticas de privacidad | Elsvan construcciones inmobiliarias',
            'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
            'keywords'      => 'Inmobiliaria, departamentos, Lima',
            'image'         => $dominio.'/images/logo-seo.png',
            );
        }

        return view('privacypolicies',$data);
    }

    public function complaintsbook(){

        $dominio = config('app.url');
        $data['seo'] = array(
            'title'         => 'Libro de reclamaciones | Elsvan construcciones inmobiliarias',
            'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
            'keywords'      => 'Inmobiliaria, departamentos, Lima',
            'image'         => $dominio.'/images/logo-seo.png',
        );

         $libro = Claim::latest()->count();
         $number = $libro + 1;

        $data['number'] = $number;
        $data['anioActual'] = Carbon::now()->year;
        $data['fechaActual'] = Carbon::now()->format('d/m/Y');

        return view('complaintsbook',$data);
    }


    public function reclamos(Request $request){
        try {
            $claim = Claim::create([
                'name'=> $request->name,
                'address'=> $request->address,
                'mail'=> $request->mail,
                'phone'=> $request->phone,
                'typedocument'=> $request->typedocument,
                'document'=> $request->document,
                'services'=> $request->services,
                'hired'=> $request->hired,
                'typeclaim'=> $request->typeclaim,
                'description'=> $request->description,
                'isauthorization'=> $request->isauthorization,
                'father_name'=> $request->father_name,
                'father_document'=> $request->father_document,
                'father_mail'=> $request->father_mail,
                'father_phone'=> $request->father_phone,
                'father_address'=> $request->father_address,
                'reference_number'=>$request->numberReclamo,
            ]);

            try {
                Mail::to(config('mail.contact_to'))->send(new ClaimFormMail($claim));
            } catch (\Throwable $th) {
                Log::error('Error al enviar el correo de reclamo: '.$th->getMessage(), [
                    'exception' => $th,
                ]);
            }

            return response()->json(['status' => true, 'msg' => "Tu reclamo fué registrado satisfactoriamente, te responderemos lo antes posible"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Ocurrió un error, inténtalo de nuevo más tarde."]);
        }
    }
}
