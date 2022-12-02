@extends('layouts.main')
@section('title', 'Home Page')
@section('content')

<style>
    .card {
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
        margin: auto 10px;
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
        align-items: center;
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

    @media only screen and (max-width: 600px) {
        .btn-slider {
            display:none;
        }
    }

</style>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == 0 ? 'active':'' }}" data-bs-interval="10000">
            @if ($sliderItem->image)
            <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" height="300" alt="...">
            @endif
            {{-- <div class="carousel-caption">
                <div class="custom-carousel-content">
                    <h1>
                        {!! $sliderItem->title !!}
                    </h1>
                    <p>
                        {!! $sliderItem->description !!}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider rounded-3">
                            See More
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{-- Kategori --}}
{{-- <div class="py-3 my-3 mx-3 shadow-sm rounded-3 bg-white">
    <div class="container">
        <div class="row row-cols-6">
            <div class="col-md-12">
                <h4>Kategori Products</h4>
                <div class="underline mb-4"></div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-6 gx-2">
            @forelse ($categories as $categoryItem)
            <div class="col">
                <div class="bg-light" style="height: 150px;">
                    <div class="card text-bg-light" style="height: 150px;">
                        <div
                            style="height: 160px; max-width: 150px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                            <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                <img src="{{ asset("$categoryItem->image") }}" style="max-height: 150px; width: 100%;" class="" alt="Laptop">
                            </a>
                        </div>
                        <a class="text-decoration-none" href="{{ url('/collections/'.$categoryItem->slug) }}">
                            <div class="card-body bg-white rounded-bottom py-2">
                                <p class="brand mb-0" style="color: black; font-weight: 500;">
                                    {{$categoryItem->name}}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>No Categories Available</h5>
            </div>
            @endforelse
        </div>
    </div>
</div> --}}
{{-- End Kategori --}}

{{-- Trending Products --}}
{{-- <div class="py-3 my-3 mx-3 shadow-sm rounded-3 bg-white">
    <div class="px-4">
        <h4>Trending Products</h4>
    </div>

    <div class="slider">
        <button id="prev" class="btn-slider">
            <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
        </button>
        @if ($trendingProducts)
        <div class="card-content">
            <!-- Card -->
            @foreach ($trendingProducts as $productItem)
            <div class="card">
                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                    <div class="card-img"
                        style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                        @if ($productItem->productImages->count() > 0)

                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}"
                            style="max-height: 170px; width: 100%;">

                        @endif
                    </div>
                    <div class="card-text">
                        <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                            <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                        </p>
                        <p class="product-name mb-1">
                            <a class="product-name text-decoration-none"
                                href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                {{$productItem->name}}
                            </a>
                        </p>
                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <div>
                                <span style="font-size: 19px; font-weight: 500; color: black;"
                                    class="selling-price card-text">Rp.
                                    {{$productItem->selling_price}}
                                </span>
                                <span style="font-size: 16px;"
                                    class="original-price text-muted text-decoration-line-through">Rp.
                                    {{$productItem->original_price}}
                                </span>
                            </div>
                        </a>
                    </div>
                </a>
            </div>
            <!-- Card End -->
            @endforeach
        </div>
        @else
        <div class="col-md-12">
            <div class="p-2">
                <h4>No Products Available</h4>
            </div>
        </div>
        @endif

        <button id="next" class="btn-slider">
            <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
        </button>
    </div>
</div> --}}
{{-- End Trending Products --}}

{{-- New Arrivals --}}
<div class="py-3 py-lg-3 m-0 m-lg-2 mt-2 bg-white" style="border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 7px 0px, rgba(0, 0, 0, 0.06) 0px 2px 4px 3px;">
    <div class="container-fluid">
        <div class="col-md-12 ps-2 m-auto">
            <h4>New Arrivals</h4>
        </div>

        <div class="row row-cols-2 row-cols-lg-6 g-0">
            @forelse ($newArrivalsProducts as $productItem)
            <div class="col col-6 col-lg-2">
                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                    <div class="card border" style="height: 300px; min-height: 300px; max-height: 300px; border-radius: 4px; box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                        <div class="card-img bg-light" style="height: 170px; max-width: 210px; border-radius: 4px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                            @if ($productItem->productImages->count() > 0)
                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="max-height: 165px; width: 100%; object-fit: contain;">
                            @endif
                        </div>
                        <div class="card-body pt-2">
                            <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                            </p>
                            <p class="product-name mb-1">
                                <a class="product-name text-decoration-none"
                                    href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{$productItem->name}}
                                </a>
                            </p>
                            <a class="text-decoration-none" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                <div>
                                    @if ($productItem->selling_price != null)
                                        <span style="font-size: 19px; font-weight: 500; color: black;" 
                                        class="selling-price card-text">Rp.
                                            {{$productItem->selling_price}}
                                        </span>
                                        <span style="font-size: 16px;"
                                            class="original-price text-muted text-decoration-line-through">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @else
                                        <span style="font-size: 19px; font-weight: 500; color: black;"
                                            class="original-price card-text">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @endif
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-md-12 p-2">
                <h4>No Products Available</h4>
            </div>
            @endforelse
        </div>
        
        <div class="mt-3">
            <a href="{{ url('new-arrivals') }}" class="btn border w-100 rounded-3" 
            style="font-size: 15.5px; font-weight: 500; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">See More 
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</div>
{{-- End New Arrivals --}}

{{-- Featured Products --}}
{{-- <div class="py-3 my-3 mx-3 shadow-sm rounded-3 bg-white">
    <div class="px-4">
        <h4>Featured Products
            <a href="{{ url('featured-products') }}" class="see-more float-end"
                style="font-size: 15.5px; font-weight: 500;">See More <i class="fa-solid fa-arrow-right-long"></i></a>
        </h4>
    </div>
    <div class="slider">
        <button id="prev" class="btn-slider">
            <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
        </button>

        @if ($featuredProducts)
        <div class="card-content">
            <!-- Card -->
            @foreach ($featuredProducts as $productItem)
            <div class="card">
                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                    <div class="card-img"
                        style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                        @if ($productItem->productImages->count() > 0)

                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}"
                            style="max-height: 170px; width: 100%;">

                        @endif
                    </div>
                    <div class="card-text">
                        <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                            <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                        </p>
                        <p class="product-name mb-1">
                            <a class="product-name text-decoration-none"
                                href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                {{$productItem->name}}
                            </a>
                        </p>
                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <div>
                                @if ($productItem->selling_price != null)
                                    <span style="font-size: 19px; font-weight: 500; color: black;"
                                        class="selling-price card-text">Rp.
                                        {{$productItem->selling_price}}
                                    </span>
                                    <span style="font-size: 16px;"
                                        class="original-price text-muted text-decoration-line-through">Rp.
                                        {{$productItem->original_price}}
                                    </span>
                                @else
                                    <span style="font-size: 19px; font-weight: 500; color: black;"
                                        class="original-price card-text">Rp.
                                        {{$productItem->original_price}}
                                    </span>
                                @endif
                                
                            </div>
                        </a>
                    </div>
                </a>
            </div>
            <!-- Card End -->
            @endforeach
        </div>
        @else
        <div class="col-md-12">
            <div class="p-2">
                <h4>No Featured Products Available</h4>
            </div>
        </div>
        @endif

        <button id="next" class="btn-slider">
            <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
        </button>
    </div>
</div> --}}
{{-- End Featured Products --}}

{{-- Most Buyed Products --}}
<div class="py-3 py-lg-3 m-0 m-lg-2 mt-2 bg-white" style="border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 7px 0px, rgba(0, 0, 0, 0.06) 0px 2px 4px 3px;">
    <div class="container-fluid">
        <div class="ps-2">
            <h4>Most Buyed Products</h4>
        </div>
        
        <div class="slider">
            <button id="prev" class="btn-slider">
                <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
            </button>

            @if ($best_sellings)
            <div class="card-content">
                <!-- Card -->
                @foreach ($best_sellings as $productItem)
                <div class="card border" style="height: 300px; min-height: 300px; min-width: 210px; border-radius: 4px; box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                        <div class="card-img bg-light" style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                            @if ($productItem->productImages->count() > 0)
                            <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}"
                                style="max-height: 165px; width: 100%; object-fit: contain;">

                            @endif
                        </div>
                        <div class="card-body" style="min-width: 210px; max-width: 210px;">
                            <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                            </p>
                            <p class="product-name mb-1">
                                <a class="product-name text-decoration-none"
                                    href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{$productItem->name}}
                                </a>
                            </p>
                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                <div>
                                    @if($productItem->selling_price != null)
                                        <span style="font-size: 19px; font-weight: 500; color: black;"
                                            class="selling-price card-text">Rp.
                                            {{$productItem->selling_price}}
                                        </span>
                                        <span style="font-size: 16px;"
                                            class="original-price text-muted text-decoration-line-through">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @else
                                        <span style="font-size: 19px; font-weight: 500; color: black;"
                                            class="original-price card-text">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- Card End -->
                @endforeach
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Featured Products Available</h4>
                </div>
            </div>
            @endif

            <button id="next" class="btn-slider">
                <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
            </button>
        </div>
            
        <div class="mt-3">
            <a href="{{ url('most-buyed') }}" class="btn border w-100 rounded-3" 
            style="font-size: 15.5px; font-weight: 500; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">See More 
                
            </a>
        </div>
    </div>
</div>
{{-- Most Buyed Products --}}

{{-- Top Rated Products --}}
<div class="py-3 py-lg-3 m-0 m-lg-2 mt-2 bg-white" style="border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 7px 0px, rgba(0, 0, 0, 0.06) 0px 2px 4px 3px;">
    <div class="container-fluid">
        <div class="ps-2">
            <h4>Top Rated Products</h4>
        </div>

        <div class="slider">
            <button id="prev-top-rated" class="btn-slider">
                <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
            </button>

            @if ($best_rated)
            <div class="card-content card-content-top-rated">
                <!-- Card -->
                @foreach ($best_rated as $productItem)
                <div class="card border" style="height: 300px; min-height: 300px; min-width: 210px; border-radius: 4px; box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                        <div class="card-img"
                            style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                            @if ($productItem->productImages->count() > 0)

                            <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}"
                                style="max-height: 165px; width: 100%; object-fit: contain;">

                            @endif
                        </div>
                        <div class="card-body" style="min-width: 210px; max-width: 210px;">
                            <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                            </p>
                            <p class="product-name mb-1">
                                <a class="product-name text-decoration-none"
                                    href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{$productItem->name}}
                                </a>
                            </p>
                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                <div>
                                    @if ($productItem->selling_price != null)
                                        <span style="font-size: 19px; font-weight: 500; color: black;"
                                            class="selling-price card-text">Rp.
                                            {{$productItem->selling_price}}
                                        </span>
                                        <span style="font-size: 16px;"
                                            class="original-price text-muted text-decoration-line-through">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @else
                                        <span style="font-size: 19px; font-weight: 500; color: black;"
                                            class="original-price card-text">Rp.
                                            {{$productItem->original_price}}
                                        </span>
                                    @endif
                                    
                                </div>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- Card End -->
                @endforeach
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Featured Products Available</h4>
                </div>
            </div>
            @endif

            <button id="next-top-rated" class="btn-slider visually-xs-hidden">
                <img src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
            </button>
        </div>
            
        <div class="mt-3">
            <a href="{{ url('top-rated') }}" class="btn border w-100 rounded-3" 
            style="font-size: 15.5px; font-weight: 500; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">See More 
                
            </a>
        </div>
    </div>
</div>
{{-- Top Rated Products --}}


@endsection

@section('script')

<script>
    $('.four-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    });
</script>

<!-- Most Buyed Slider Button Function -->
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
<!-- End Most Buyed Slider Button Function -->

<!-- Top Rated Slider Button Function -->
<script>
    const nextTop = document.querySelector('#next-top-rated')
    const prevTop = document.querySelector('#prev-top-rated')

    function handleScrollNextTop(direction) {
        const cards = document.querySelector('.card-content-top-rated')
        cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    function handleScrollPrevTop(direction) {
        const cards = document.querySelector('.card-content-top-rated')
        cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth -
            100
    }

    nextTop.addEventListener('click', handleScrollNextTop)
    prevTop.addEventListener('click', handleScrollPrevTop)
</script>
<!-- End Top Rated Slider Button Function -->

@endsection
