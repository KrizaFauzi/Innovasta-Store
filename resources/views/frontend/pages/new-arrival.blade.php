@extends('layouts.main')
@section('title', 'New Arrivals Product')
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

    .notify-badge {
        position: absolute;
        right: 5px;
        top: 5px;
        background: red;
        text-align: center;
        border-radius: 5px;
        color: white;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 9px;
        padding-right: 9px;
        font-size: 14px;
    }

    .see-more {
        text-decoration: none;
        color: #07689f;
        font-size: 16px;
    }

    .see-more:hover {
        text-decoration: underline;
        color: #40a8c5;
    }

</style>

<div class="py-4">
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>New Arrivals
                {{-- <a href="{{ url('collections') }}" class="see-more fw-semibold float-end">Shop More 
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a> --}}
            </h4>
        </div>

        <div class="row row-cols-2 row-cols-lg-6 g-0">
            @forelse ($newArrivalsProducts as $productItem)
            <div class="col col-6 col-lg-2">
                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                    <div class="card border" style="height: 300px; min-height: 300px; max-height: 300px; border-radius: 4px; box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                        <span class="notify-badge">New</span>
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

        {{-- <div class="text-center mt-3">
            <a href="{{ url('collections') }}" class="btn btn-warning fw-semibold px-3">
                View More
            </a>
        </div> --}}
    </div>
</div>

@endsection
