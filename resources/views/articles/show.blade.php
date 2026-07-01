@extends('layouts.web')

    @section('content')
        <div class="pt-6"></div>
        <div class="section">
            <div class="mb-2 text-white">
                @for($i=0; $i< count($tags) ; $i++)
                <a href="/blog?title={{$tags[$i]}}" class="bg-green text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                {{$tags[$i]}}
                </a>
                @endfor
            </div>
            <div class="grid grid-cols-1 {{ $relacionadas->isNotEmpty() ? 'lg:grid-cols-3' : '' }} gap-12">
                <section class="col-span-1 {{ $relacionadas->isNotEmpty() ? 'lg:col-span-2' : '' }}">
                    <figure>
                        <img src="{{ $note->image ? Storage::disk('public')->url($note->image) : '' }}" alt="{{$note->title}}" class="aspect-[16/9] w-full object-cover object-center rounded-lg mb-6">
                    </figure>
                    <div class="extra_blog">
                        <div>
                            Por <span class="text-brown font-medium mr-2"> Redacción Elvan Inmobiliaria </span> <i class="las la-calendar"></i>{{ date('d M Y', strtotime( $note->created_at)) }}
                        </div>
                        <div>
                            <ul class="share_list">
                                <li>
                                    <a aria-label="Facebook" title="Compartir en Facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$link}}"  class="share_item share_facebook" target="_blank">  <i class="lab la-facebook-f  icon_share_item text-white"></i></a>
                                </li>
                                <li>
                                    <a aria-label="Whatsapp" title="Compartir en Whatsapp" href="https://api.whatsapp.com/send?text={{$note->title}}%20{{$link}}" class="share_item share_whatsapp" target="_blank">
                                        <i class="lab la-whatsapp icon_share_item text-white"></i>
                                    </a>
                                </li>
                                <li>
                                    <a aria-label="Twitter" title="Compartir en Twitter" href="https://twitter.com/intent/tweet?text={{$note->title}}&url={{$link}}" class="share_item share_x" target="_blank">
                                        <svg class="icon_share_item" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path fill="#fff" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a aria-label="Linkedin" title="Compartit en Linkedin" href="http://www.linkedin.com/shareArticle?url={{$link}}" class="share_item share_link" target="_blank">  <i class="lab la-linkedin-in icon_share_item text-white"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr class="my-3">
                    <h1 class="text-2xl lg:text-4xl font-semibold mb-6">{{$note->title}}</h1>
                    <div class="mb-16 ckeditor">
                        {!! $note->content !!}
                    </div>
                </section>
                @if($relacionadas->isNotEmpty())
                <aside class="col-span-1 hidden lg:block">
                    <h2 class="text-xl font-semibold mb-6">ARTÍCULOS SIMILARES</h2>
                    <ul class="space-y-4">
                        @foreach($relacionadas as $articulos)

                                <li class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('noticias.show', $articulos) }}">
                                        <figure>
                                            <img src="{{ $articulos->image ? Storage::disk('public')->url($articulos->image) : '' }}" alt="{{$articulos->title}}" class="aspect-[16/9] object-cover object-center">
                                        </figure>
                                    </a>
                                    <a href="{{ route('noticias.show', $articulos) }}">
                                        <h3 class="text-sm font-semibold">{{Str::limit($articulos->title,120)}}</h3>
                                    </a>
                                </li>

                        @endforeach
                    </ul>
                </aside>
                @endif
            </div>
        </div>

@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
