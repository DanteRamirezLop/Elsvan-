@extends('layouts.web')

@section('content')

    <section class="section">
        <div class="pt-10" id="embedded-content">
        {!! $page->content !!}
        </div>
    </section>

@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:title" content="{{$seo['title']}}" />
    <meta property="og:description" content="{{$seo['description']}}" />
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
