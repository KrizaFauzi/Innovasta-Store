@extends('layouts.main')
@section('title', 'Featured Products')
@section('content')

<style>
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
    <div class="container">
        <div class="row g-3">
            <div class="col-md-12">
                <h4>Featured Products
                    <a href="{{ url('collections') }}" class="see-more fw-semibold float-end">Shop More <i class="fa-solid fa-arrow-right-long"></i></a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @forelse ($featuredProducts as $productItem)
            <div class="col-md-3">
                <div class="card text-bg-light" style="height: 385px;">
                    <div style="height: 210px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">

                        @if ($productItem->productImages->count() > 0)
                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <img src="{{ asset($productItem->productImages[0]->image) }}"
                                alt="{{ $productItem->name }}" style="max-height: 210px; width: 100%;">
                        </a>
                        @endif
                    </div>
                    <div class="card-body bg-white rounded-bottom pt-2">
                        <p class="brand mb-0" style="color: blue; font-weight: 500;">
                            {{ $productItem->brand }}
                        </p>
                        <p class="product-name mb-1">
                            <a 
                            style="font-size: 16.5px; 
                            color: black; 
                            font-weight: 490;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 3; /* number of lines to show */
                                    line-clamp: 3; 
                            -webkit-box-orient: vertical;" class="text-decoration-none" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                {{$productItem->name}}
                            </a>
                        </p>
                        <div>
                            <span style="font-size: 19px;" class="selling-price card-text fw-bold">Rp. {{$productItem->selling_price}}</span>
                            <span style="font-size: 16px;" class="original-price text-muted text-decoration-line-through">Rp. {{$productItem->original_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 p-2">
                <h4>No Featured Products Available</h4>
            </div>
            @endforelse

            <div class="text-center mt-3">
                <a href="{{ url('collections') }}" class="btn btn-warning fw-semibold px-3">
                    Shop more
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
