@extends('layouts.main')

@section('title')
{{ $product->meta_title }}
@endsection

@section('meta_keyword')
{{ $product->meta_keyword }}
@endsection

@section('meta_description')
{{ $product->meta_description }}
@endsection

@section('content')
<style>
    .card-desc {
        width: 100% !important;
        min-width: 100% !important;
        max-width: 100% !important;
    }
    .card {
        width: 190px;
        min-width: 190px;
        max-width: 190px;
        height: auto;
        background: #fff;
        /*border-radius: 30px;*/
        position: relative;
        z-index: 10;
        margin: 5px;
        border: none;
        min-height: 360px;
        max-height: 360px;
        /*cursor: pointer;*/
        transition: all .25s ease;
        box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, .08);
    }

    .card:hover {
        box-shadow: 0px 0.5px 5px 0px rgba(0, 0, 0, .03);
    }

    .card h4 {
        position: absolute;
        left: 0;
        top: 0;
        padding: 15px;
    }

    .card i {
        position: absolute;
        right: 0;
        top: 0;
        padding: 15px;
        font-size: 1.4rem;
        line-height: 3.2rem;
    }

    .card .card-text {
        padding: 5px;
    }

    .card-content {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        overflow: auto;
        /*padding-top: 100px;
        padding-left: 60px;
        padding-right: 50px;*/
        scroll-behavior: smooth;
    }

    .card-content::-webkit-scrollbar {
        height: 0px;
    }

    .card-content:after {
        content: '';
        display: block;
        min-width: 20px;
        height: 100px;
        position: relative;
    }

    .btn-slider {
        min-width: 50px;
        margin: auto 30px;
        height: 50px;
        border-radius: 15px;
        background: #fff;
        border: 0px;
        outline: none;
        cursor: pointer;
        z-index: 9999;
        box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, .08);
        transition: all .25s ease;
    }

    .btn-slider:focus {
        border-color: #40d9aa;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px #40d9aa;
        outline: 0 none;
    }

    .btn-slider:hover {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px #40d9aa;
    }

    .btn-slider i {
        font-size: 1.2rem;
    }

    .slider {
        display: flex;
        alogn-items: center;
        justify-content: center;
        width: 100%;
        overflow: hidden;
    }

    .slider:after {
        content: '';
        left: 98px;
        position: absolute;
        width: 150px;
        z-index: 100;
        pointer-event: none;
    }

    .slider:before {
        content: '';
        right: 98px;
        position: absolute;
        width: 150px;
        z-index: 100;
        pointer-event: none;
    }

    .product-name {
        font-size: 16px;
        color: #0f5abd;
        font-weight: 400;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-name:hover {
        text-decoration: underline;
        color: #40a8c5;
    }

    a {
        text-decoration: none;
    }
</style>

<!-- Tailwind -->
<link rel="stylesheet" href="{{ asset('assets/css/tailwind.min.css') }}">
<div>
    <livewire:frontend.product.view :category="$category" :product="$product">
</div>

<!-- Related Category Slider Button Function -->
<script>
    const next = document.querySelector('#next')
    const prev = document.querySelector('#prev')

    function handleScrollNext(direction) {
        const cards = document.querySelector('.card-content')
        cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    function handleScrollPrev(direction) {
        const cards = document.querySelector('.card-content')
        cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    next.addEventListener('click', handleScrollNext)
    prev.addEventListener('click', handleScrollPrev)
</script>
<!-- End Related Category Slider Button Function -->

<!-- Related Brand Slider Button Function -->
<script>
    const nextRelated = document.querySelector('#next-related')
    const prevRelated = document.querySelector('#prev-related')

    function handleScrollNextRelated(direction) {
        const cards = document.querySelector('.card-content-related')
        cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    function handleScrollPrevRelated(direction) {
        const cards = document.querySelector('.card-content-related')
        cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    nextRelated.addEventListener('click', handleScrollNext)
    prevRelated.addEventListener('click', handleScrollPrev)
</script>
<!-- End Related Brand Slider Button Function -->

@endsection