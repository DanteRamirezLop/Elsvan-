<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $dominio = config('app.url');
        $page = Page::where('title','blog')->first();
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
                'title'         => 'Blog | Inmobiliaria en lima',
                'description'   => 'Elsvan desarrolla proyectos inmobiliarios que combinan diseño, calidad y sostenibilidad, consolidando una trayectoria respaldada por la confianza de sus clientes y la entrega exitosa de sus proyectos',
                'keywords'      => 'Inmobiliaria, departamentos, Lima',
                'image'         => $dominio.'/images/logo-seo.png',
            );
        }
        $data['articles'] = Article::where('is_published',1)->paginate(12);
        return view('articles.index',$data);
    }

    public function show(Article $noticia){
        $data['relacionadas'] = Article::where('id','<>',$noticia->id)->limit(8)->get();
        $data['tags'] = explode(",", $noticia->tags);
        $data['note'] = $noticia;
        $dominio = config('services.trading.url');
        $data['link']= url()->current();
        $title = $this->limpiarTitulo($noticia->title);
        //seo
        $data['seo'] = array(
            'title'         => $title.' | Elsvan Inmobiliaria',
            'description'   => $noticia->meta_description,
            'keywords'      => $noticia->tags,
            'image'         => $dominio.'/uploads/cms/'.$noticia->feature_image,
        );

        $data['faqs'] = $this->extraerFaqs($noticia->content ?? '');

        return view('articles.show',$data);
    }

    /**
     * Extrae pares pregunta/respuesta del contenido del artículo para el schema FAQPage.
     * Toma cada encabezado (h2-h4) visible en el artículo como pregunta/tema, junto
     * con los párrafos que lo siguen hasta el próximo encabezado.
     */
    private function extraerFaqs(string $html): array
    {
        if (trim($html) === '') {
            return [];
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $headings = $xpath->query('//h2 | //h3 | //h4');

        $faqs = [];

        foreach ($headings as $heading) {
            $question = trim($heading->textContent);

            if ($question === '') {
                continue;
            }

            $answerParts = [];
            $sibling = $heading->nextSibling;

            while ($sibling !== null && !in_array($sibling->nodeName, ['h1', 'h2', 'h3', 'h4'])) {
                if ($sibling->nodeType === XML_ELEMENT_NODE) {
                    $text = trim($sibling->textContent);
                    if ($text !== '') {
                        $answerParts[] = $text;
                    }
                }
                $sibling = $sibling->nextSibling;
            }

            $answer = trim(implode(' ', $answerParts));

            if ($answer !== '') {
                $faqs[] = [
                    'question' => $question,
                    'answer' => $answer,
                ];
            }
        }

        return $faqs;
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
