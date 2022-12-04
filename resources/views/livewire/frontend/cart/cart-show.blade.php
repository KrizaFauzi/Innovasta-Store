<div>
    @if (session('message'))
    <div class="toast-container position-fixed top-auto end-0 p-3">
        <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                <strong class="me-auto">{{ $websiteSetting->website_name }}</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white rounded">
                {{ session('message') }}
            </div>
        </div>
    </div>
    @endif

    <div class="container-fluid py-3 p-md-3 bg-light">
        <div class="row g-3">

            <div class="col-md-9 p-1">
                <div class="shopping-cart shadow-sm bg-white p-3">
                    <h2>Shopping Cart</h2>
                    <hr>

                    @forelse ($cart as $cartItem)
                    @if ($cartItem->product)
                    <div class="cart-item">
                        <div class="row">
                            <div class="card border-0 mb-3 p-0 rounded-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                            @if ($cartItem->product->productImages)
                                                <img src="{{ asset($cartItem->product->productImages[0]->image) }}" class="img-fluid rounded-3" alt="...">
                                            @else
                                                <img src="" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body pt-1 p-0">
                                            <p class="card-title m-0" style="font-size: 21px; line-height: 23px;">
                                                <a class="text-black" href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                    {{ $cartItem->product->name }}
                                                </a>
                                            </p>
                                            <p class="m-0">
                                                @if($cartItem->product->selling_price != null)
                                                    <label class="" style="font-size: 20px; font-weight: 600;">Rp. {{ $cartItem->product->selling_price }} </label>
                                                @else
                                                    <label class="" style="font-size: 20px; font-weight: 600;">Rp. {{ $cartItem->product->original_price }} </label>
                                                @endif
                                            </p>
                                            {{--<p class="card-text m-0">
                                                <small style="color: green;">
                                                    In Stock
                                                </small>
                                            </p>--}}
                                            <p class="m-0 mb-1" style="font-weight: 600;">
                                                @if ($cartItem->productColor)
                                                    @if ($cartItem->productColor->color)
                                                        Color: <span style="font-weight: 100;">{{ $cartItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </p>
                                            <div class="d-flex m-0 p-0">
                                                <div class="d-flex m-0 p-0" style="width: 110px;">
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="decrementQuantity({{$cartItem->id}})" class="btn border btn-sm rounded-0 rounded-start shadow-sm" style=""><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartItem->quantity }}" class="border-0 border-top border-bottom shadow-sm" style="width: 100%; outline: none; text-align: center;" />
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="incrementQuantity({{$cartItem->id}})" class="btn border btn-sm rounded-0 rounded-end shadow-sm"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                                <div class="vr mx-2"></div>
                                                <div>
                                                    <div class="remove">
                                                        <button type="button" wire:loading.attr="disabled"
                                                            wire:click="removeCartItem({{ $cartItem->id }})" class="remove-Btn btn btn-link text-decoration-none text-danger">
                                                            <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">
                                                                Delete
                                                            </span>
                                                            <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                                                <div class="spinner-border spinner-border-sm" role="status">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                </div>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <!-- cek apakah ada promo -->
                                            @if($cartItem->product->selling_price != null)
                                                <label class="price">Rp.
                                                    {{ $cartItem->product->selling_price * $cartItem->quantity }}
                                                </label>
                                                @php
                                                $totalPrice += $cartItem->product->selling_price * $cartItem->quantity
                                                @endphp
                                            @else
                                                <label class="price">Rp.
                                                    {{ $cartItem->product->original_price * $cartItem->quantity }}
                                                </label>
                                                @php
                                                $totalPrice += $cartItem->product->original_price * $cartItem->quantity
                                                @endphp
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                        <div>No Cart Items Available</div>
                    @endforelse

                </div>
            </div>

            <div class="col-md-3 p-1" style="position: -webkit-sticky; position: sticky; top: 0;">
                <div class="shadow-sm bg-white p-3" style="position: -webkit-sticky; position: sticky; top: 0;">
                    <h4>Total:
                        <span class="float-end">Rp. {{ $totalPrice }}</span>
                    </h4>
                    <hr>
                    <form action="{{ url('checkout_first') }}" method="POST">
                    @csrf
                        <input type="hidden" name="total" value="{{ $totalPrice }}" >
                        <button class="btn btn-warning w-100">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
