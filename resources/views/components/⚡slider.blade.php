<?php

use App\Models\Banner;
use Livewire\Component;

new class extends Component
{
    public $banners;

    public function mount(): void
    {
        $this->banners = Banner::query()->orderBy('id')->get();
    }
};
?>

 <div class="swiper sliderHome">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <div class="banner-category container-fluid">
                        @if($banner->imagen)
                            <div class="absolute inset-0 z-10 animate-pulse bg-gray-300"></div>
                            <img src="{{ Storage::disk('public')->url($banner->imagen) }}"
                                alt="{{ $banner->titulo }}"
                                class="banner-category-img"
                                loading="lazy"
                                onload="this.previousElementSibling.remove()"
                                onerror="this.previousElementSibling.remove()">
                        @endif
                        <div class="banner-category-box-title">
                            <h1 class="banner-category-title tracking-wider"> {{ $banner->titulo }}</h1>
                            @if($banner->subtitulo)
                                <p class="text-center text-white text-xl lg:text-3xl"> {{ $banner->subtitulo }} </p>
                            @endif
                            @if($banner->link)
                                <div class="text-center mt-5">
                                    <a href="{{ $banner->link }}" class="btn-banner "> Cotiza aquí </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Paginación --}}
        <div class="swiper-pagination"></div>
        {{-- Flechas --}}
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
