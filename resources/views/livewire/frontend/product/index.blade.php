<div>
    <div class="offcanvas h-auto offcanvas-bottom" tabindex="-1" id="offcanvasBottom" data-bs-backdrop="false"
        aria-labelledby="offcanvasBottomLabel" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
        <div class="offcanvas-header border-bottom" style="padding-top: 13px; padding-bottom: 13px;">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                style="border: 1px solid #000; box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="row row-cols-2 row-cols-lg-5">
                <div class="col">
                    <p class="mb-1" style="font-size: 20px;">Brand</p>
                    <ul style="list-style-type: none; padding-left: 10px;">
                        @if ($category->brands)
                            @foreach ($category->brands as $brandItem)
                                <li>
                                    <input class="me-2" type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}">
                                    <span style="font-size: 17px;">{{$brandItem->name}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col">
                    <p class="mb-1" style="font-size: 20px;">Harga</p>
                    <ul style="list-style-type: none; padding-left: 10px;">
                        <li>
                            <input class="me-2" type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">
                            <span style="font-size: 17px;">High to Low</span>
                        </li>
                        <li>
                            <input class="me-2" type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">
                            <span style="font-size: 17px;">Low to High</span>
                        </li>
                    </ul>
                    <p style="width: 100%; text-align: center; border-bottom: 1px solid #000; line-height: 0.1em; margin: 10px 0 20px;">
                        <span style="background:#fff; padding: 0 10px;">OR</span>
                    </p>
                    <div class="widget marcado-widget filter-widget price-filter">
                        <p style="font-size: 20px;">Harga 
                            <span class="text-info" style="font-size: 17px;">Rp. {{$min_price}} - Rp. {{$max_price}}</span>
                        </p>
                        <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                            <div id="slider" wire:ignore></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-md-2 bg-white shadow-sm py-2">
                @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h5>Brands</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}">
                            {{$brandItem->name}}
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Price</h4>
                    </div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">
                            High to Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">
                            Low to High
                        </label>
                    </div>
                </div>
            </div> --}}

            <div class="col py-3">
                <h4 class="mb-3">Our Products</h4>
                <div class="row row-cols-2 row-cols-lg-6 g-0">
                    @forelse ($products as $productItem)
                    <div class="col col-prod">
                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <div class="card content-card border"
                                style="height: 340px; min-height: 340px; max-height: 340px; border-radius: 4px; box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                                <div class="card-img bg-light"
                                    style="height: 175px; max-width: 220px; border-radius: 4px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                                    @if ($productItem->productImages->count() > 0)
                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                        alt="{{ $productItem->name }}"
                                        style="margin: auto; max-height: 170px; width: 100%; object-fit: contain;">
                                    @endif
                                </div>
                                <div class="card-body pt-2">
                                    <p class="brand mb-0" style="font-size: 14.3px; color: #ee6c4d; font-weight: 500;">
                                        <span class="text-muted">Brand :</span> {{ $productItem->brand }}
                                    </p>
                                    <p class="product-name mb-0">
                                        <a class="product-name text-decoration-none"
                                            href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                            {{$productItem->name}}
                                        </a>
                                    </p>
                                    <a class="text-decoration-none"
                                        href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        <div>
                                            @if ($productItem->selling_price != null)
                                            <span style="font-size: 18px; font-weight: 500; color: black;"
                                                class="selling-price card-text">Rp.
                                                {{$productItem->selling_price}}
                                            </span>
                                            <span style="font-size: 15px;"
                                                class="original-price text-muted text-decoration-line-through">Rp.
                                                {{$productItem->original_price}}
                                            </span>
                                            @else
                                            <span style="font-size: 18px; font-weight: 500; color: black;"
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
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 100000],
            connect: true,
            range: {
               'min': 1,
               'max': 100000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function(value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        });
    </script>
@endpush
