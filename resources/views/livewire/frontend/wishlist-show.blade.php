<div>

    @if (session('message'))
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

    <div class="p-0 p-lg-3 bg-light">
        <div class="container-fluid bg-white rounded p-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
            <h4>Your Wishlist</h4>

            <div class="row row-cols-1 row-cols-lg-2 px-0 px-lg-3">
                @forelse ($wishlist as $wishlistItem)
                @if ($wishlistItem->product)
                <div class="col p-0">
                    <hr class="p-0 my-2">
                    <div class="d-flex ps-3" style="min-height: 150px;">
                        <div class="flex-shrink-0 m-auto">
                            <img src="{{ $wishlistItem->product->productImages[0]->image }}" class="m-auto"
                                style="width: 150px; height: auto" alt="{{ $wishlistItem->product->name }}">
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <div class="lh-sm" style="font-size: 20px; font-weight: 100; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $wishlistItem->product->name }}
                            </div>
                            <div class="lh-sm">
                                @if ($wishlistItem->product->quantity)
                                    <span style="font-size: 14px;" class="text-success">In Stock</span>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            </div>
                            <div class="lh-sm">
                                @if ($wishlistItem->product->selling_price != null)
                                    <span style="font-size: 20px; font-weight: 500; color: black;"
                                        class="selling-price card-text">Rp.
                                        {{$wishlistItem->product->selling_price}}
                                    </span>
                                    <span style="font-size: 16px;"
                                        class="original-price align-bottom text-muted text-decoration-line-through">Rp.
                                        {{$wishlistItem->product->original_price}}
                                    </span>
                                @else
                                    <span style="font-size: 20px; font-weight: 500; color: black;"
                                        class="original-price card-text">Rp.
                                        {{$wishlistItem->product->original_price}}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <div class="hstack gap-3">
                                    <div class="remove">
                                        <a wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="btn btn-sm border"
                                            style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
                                            <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                Delete
                                            </span>
                                            <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vr p-0"></div>
                    </div>
                    <hr>
                </div>
                @endif
                @empty
                    <div>No Wishlist Added</div>
                @endforelse
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        @forelse ($wishlist as $wishlistItem)
                        @if ($wishlistItem->product)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a
                                        href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                        <label class="product-name">
                                            <img src="{{ $wishlistItem->product->productImages[0]->image }}"
                                                style="width: 50px; height: 50px"
                                                alt="{{ $wishlistItem->product->name }}">
                                            {{ $wishlistItem->product->name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    @if ($wishlistItem->product->selling_price != null)
                                    <label class="price">${{ $wishlistItem->product->selling_price }}</label>
                                    @else
                                    <label class="price">${{ $wishlistItem->product->original_price }}</label>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})"
                                            class="btn btn-danger btn-sm">
                                            <span wire:loading.remove
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Remove
                                            </span>
                                            <span wire:loading
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Removing
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <h4>No Wishlist Added</h4>
                        @endforelse

                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
