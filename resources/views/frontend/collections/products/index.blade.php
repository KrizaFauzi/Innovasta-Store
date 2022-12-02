@extends('layouts.main')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')

<style>
    .content-card {
        /*width: 210px;
        min-width: 210px;
        max-width: 210px;*/
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

    .product-name {
        font-size: 16px;
        color: #0f5abd;
        font-weight: 400;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* number of lines to show */
        line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .product-name:hover {
        text-decoration: underline;
        color: #40a8c5;
    }

    a {
        text-decoration: none;
    }

    .notify-badge {
        position: absolute;
        right: 5px;
        top: 5px;
        text-align: center;
        border-radius: 5px;
        color: white;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 7px;
        padding-right: 7px;
        font-size: 14px;
    }

    .col-prod {
        width: 220px;
        min-width: 220px;
        max-width: 220px;
    }

    @media only screen and (max-width: 768px) {
        .col-prod {
            width: 175.5px;
            min-width: 175.5px;
            max-width: 175.5px;
        }
    }

</style>

<nav class="navbar navbar-expand-lg rounded-0 sticky-top p-0 py-0 bg-light"
    style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <div class="container-fluid">
        <!-- Back to top button -->
        <button type="button" class="btn btn-transparent border-0 rounded-0 border-start ms-auto" onclick="topFunction()" id="myBtn">
            Back to top
        </button>

        <button class="btn btn-transparent border-0 rounded-0 border-start" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            Filters<img class="ms-2" src="https://img.icons8.com/tiny-glyph/11/000000/chevron-down.png" />
        </button>
    </div>
</nav>

<div class="bg-light">
    <livewire:frontend.product.index :category="$category" />
</div>


<script>
    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "block";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
@endsection
