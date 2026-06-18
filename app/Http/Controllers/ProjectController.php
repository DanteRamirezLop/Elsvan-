<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('projects.index');
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
