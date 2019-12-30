@extends('layouts.front_layout')

@section('css')
<style>
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .main-cotent {
        margin-top: 60px;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
@endsection

@section('content')
<div class="container main-cotent">
    <div class="row">
        <div class="col-12 col-md-6">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($product->product_imgs as $product_img)
                    <div class="swiper-slide">
                        <img class="img-fluid" src="{{ $product_img->img }}" alt="">
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h1>{{ $product->title }}</h1>
            <p>{!! $product->description !!}</p>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>
@endsection
