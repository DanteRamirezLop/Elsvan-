@extends('layouts.web')

@section('content')

    <section>
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam pariatur possimus fugiat alias aperiam itaque quod autem velit dolorum corporis veniam libero reprehenderit, molestiae quis, commodi expedita saepe ex! Dolores!
    </section>

@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
