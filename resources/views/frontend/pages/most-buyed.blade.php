@extends('layouts.main')
@section('title', 'Most Buyed Products')
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

    .see-more {
        text-decoration: none;
        color: #07689f;
        font-size: 16px;
    }

    .see-more:hover {
        text-decoration: underline;
        color: #40a8c5;
    }

    /* CSS */
    .button-32 {
        background-color: #fff000;
        border-radius: 7px;
        color: #000;
        cursor: pointer;
        font-weight: 500;
        padding: 5px;
        text-align: center;
        transition: 200ms;
        width: 100%;
        box-sizing: border-box;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .button-32:not(:disabled):hover {
        background: #f4e603;
    }

    .button-32:not(:disabled):focus {
        outline: 1;
        background: #f4e603;
        box-shadow: 0 0 10px 1px #40a8c5;
    }

    .button-32:disabled {
        filter: saturate(0.2) opacity(0.5);
        -webkit-filter: saturate(0.2) opacity(0.5);
        cursor: not-allowed;
    }

</style>

<div class="py-4">
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>Most Buyed Products</h4>
            <!-- <div class="underline mb-4"></div> -->
        </div>

        <div class="row row-cols-2 row-cols-lg-6 g-0">
            @forelse ($best_sellings as $productItem)
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
                <h4>No Most Buyed Products Available</h4>
            </div>
            @endforelse
        </div>

        <!-- <div class="text-center mt-3">
                <a href="{{ url('collections') }}">
                    <button class="button-32" role="button">Seller Central</button>
                </a>
            </div> -->
    </div>
</div>

@endsection
