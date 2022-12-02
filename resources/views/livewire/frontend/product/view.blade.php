<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
            <div class="toast-container position-fixed top-auto end-0 p-3">
                <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                        <strong class="me-auto">GoodFance Bag</strong>
                        {{-- <small>11 mins ago</small> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white rounded">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">

                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach ($product->productImages as $itemImg)
                                    <li>
                                        <img src="{{ asset($itemImg->image) }}" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                </a> <a href="javascript:void(0);" class="exzoom_next_btn">
                                </a>
                            </p>
                        </div>
                        @else
                        No Image Added
                        @endif
                    </div>
                </div>

                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name text-decoration-none text-black">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path mb-0">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <p class="product-path m-0">Brand : {{ $product->brand }}</p>
                        <div>
                            @if($product->selling_price != null)
                            <span class="selling-price" style="font-weight: 500;">Rp. {{ $product->selling_price }}</span>
                            <span class="original-price" style="font-weight: 500;">Rp. {{ $product->original_price }}</span>
                            @else
                            <span class="selling-price" style="font-weight: 500;">Rp. {{ $product->original_price }}</span>
                            @endif
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}">
                                        {{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel" style="background-color: {{ $colorItem->color->code }}"
                                            wire:click="colorSelected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                            <div>
                                @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                <label class="text-danger">Out of Stock</label>
                                @else
                                <label style="padding-top: 2.5px; padding-bottom: 2.5px;"
                                    class="text-success">In Stock</label>
                                @endif
                            </div>
                            @else
                                @if ($product->quantity)
                                    <label class="text-success">In Stock</label>
                                @else
                                    <label class="text-danger">Out of Stock</label>
                                @endif
                            @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <div class="bg-transparent rounded border" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;">
                                    <span class="btn border-end rounded-0 border-0" wire:click="decrementQuantity" style="">
                                        <i class="fa fa-minus"></i>
                                    </span>
                                    <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                        readonly class="mx-0 bg-transparent" style="width: 50px; text-align: center;" />
                                    <span class="btn border-start rounded-0 border-0" wire:click="incrementQuantity" style="">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn border rounded-3 bg-warning" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>

                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn border rounded-3 bg-info" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card card-desc">
                        <div class="card-header border-0 bg-white">
                            <h4 style="font-size: 25px;">Description</h4>
                        </div>
                        <div class="card-body mt-4">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('product-ratings', ['product' => $product], key($product->id))
        </div>
    </div>
</div>

<div class="py-3 mt-2 bg-white">
    <div class="container-fluid">
        <div class="px-4">
            <h2 style="font-size: 21px;">
                Related
                @if ($category)
                {{ $category->name }}
                @endif
                Products
            </h2>
        </div>

        <div class="slider">
            <button id="prev" class="btn-slider">
                <img class="m-auto" src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
            </button>

            @if ($category)
            <div class="card-content">
                <!-- Card -->
                @foreach ($category->relatedProducts as $relatedProductItem)
                <div class="card">
                    <a
                        href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                        <div class="card-img"
                            style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                            @if ($relatedProductItem->productImages->count() > 0)
                            <img src="{{ asset($relatedProductItem->productImages[0]->image) }}"
                                alt="{{ $relatedProductItem->name }}" style="max-height: 100%; width: 100%; object-fit: contain;">

                            @endif
                        </div>
                        <div class="card-text">
                            <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                <span class="text-muted">Brand :</span> {{ $relatedProductItem->brand }}
                            </p>
                            <p class="product-name mb-1">
                                <a class="product-name text-decoration-none"
                                    href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                    {{$relatedProductItem->name}}
                                </a>
                            </p>
                            <a
                                href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                <div>
                                    @if($relatedProductItem->selling_price != null)
                                    <span style="font-size: 19px; font-weight: 500; color: black;"
                                        class="selling-price card-text">Rp.
                                        {{$relatedProductItem->selling_price}}
                                    </span>
                                    <span style="font-size: 16px;"
                                        class="original-price text-muted text-decoration-line-through">Rp.
                                        {{$relatedProductItem->original_price}}
                                    </span>
                                    @else
                                    <span style="font-size: 19px; font-weight: 500; color: black;"
                                        class="original-price card-text">Rp.
                                        {{$relatedProductItem->original_price}}
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
                <div class="p-2">
                    <h4>No Related Products Available</h4>
                </div>
            @endif

            <button id="next" class="btn-slider">
                <img class="m-auto" src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
            </button>
        </div>
    </div>
</div>

<div class="py-3 mt-2 bg-white">
    <div class="container-fluid">
        <div class="px-4">
            <h2 style="font-size: 21px;">
                Related
                @if ($product)
                {{ $product->brand }}
                @endif
                Products
            </h2>
        </div>

        <div class="slider">
            <button id="prev-related" class="btn-slider">
                <img class="m-auto" src="https://img.icons8.com/ios-glyphs/25/null/chevron-left.png" />
            </button>

            @if ($category)
            <div class="card-content card-content-related">
                <!-- Card -->
                @foreach ($category->relatedProducts as $relatedProductItem)
                    @if ($relatedProductItem->brand == "$product->brand")
                        <div class="card">
                            <a
                                href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                <div class="card-img"
                                    style="height: 170px; max-width: 210px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                                    @if ($relatedProductItem->productImages->count() > 0)
                                    <img src="{{ asset($relatedProductItem->productImages[0]->image) }}"
                                        alt="{{ $relatedProductItem->name }}" style="max-height: 100%; width: 100%; object-fit: contain;">
        
                                    @endif
                                </div>
                                <div class="card-text">
                                    <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                        <span class="text-muted">Brand :</span> {{ $relatedProductItem->brand }}
                                    </p>
                                    <p class="product-name mb-1">
                                        <a class="product-name text-decoration-none"
                                            href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                            {{$relatedProductItem->name}}
                                        </a>
                                    </p>
                                    <a
                                        href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                        <div>
                                            @if($relatedProductItem->selling_price != null)
                                            <span style="font-size: 19px; font-weight: 500; color: black;"
                                                class="selling-price card-text">Rp.
                                                {{$relatedProductItem->selling_price}}
                                            </span>
                                            <span style="font-size: 16px;"
                                                class="original-price text-muted text-decoration-line-through">Rp.
                                                {{$relatedProductItem->original_price}}
                                            </span>
                                            @else
                                            <span style="font-size: 19px; font-weight: 500; color: black;"
                                                class="original-price card-text">Rp.
                                                {{$relatedProductItem->original_price}}
                                            </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <!-- Card End -->
                    @endif
                @endforeach
            </div>
            @else
            <div class="p-2">
                <h4>No Related Products Available</h4>
            </div>
            @endif

            <button id="next-related" class="btn-slider">
                <img class="m-auto" src="https://img.icons8.com/ios-glyphs/25/null/chevron-right.png" />
            </button>
        </div>
    </div>
</div>

</div>

@push('scripts')

<script>
    $(function () {

        $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000

        });

    });

    $('.four-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    });

</script>

@endpush
