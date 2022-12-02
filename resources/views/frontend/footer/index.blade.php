<div>
    <style>
        .gmail {
            text-decoration: none;
            color: white;
        }

        .gmail:hover {
            text-decoration: underline;
            color: whitesmoke;
        }

    </style>

    <div class="footer-area">
        <div class="container-fluid">
            <div class="row m-auto">
                <div class="col-md-4">
                    {{-- <h4 class="footer-heading">{{ $appSetting->website_name ?? 'website name' }}</h4> --}}
                    <h4 class="footer-heading pb-2 ps-1" style="background: linear-gradient(to right, #f36625, white); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-family: 'Bukhari Script', sans-serif;">
                        {{ $appSetting->website_name }}
                    </h4>
                    <div class="footer-underline"></div>
                    <h4>Tentang Kami</h4>
                    <p>
                        {{ $appSetting->meta_keyword }}
                    </p>
                    <h4>Tujuan Kami</h4>
                    <p>
                        {{ $appSetting->meta_description }}
                    </p>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-heading">Contact Us</h4>
                    <div class="footer-underline"></div>
                    <div class="d-flex m-auto">
                        <img src="https://img.icons8.com/fluency-systems-regular/30/FFFFFF/gmail.png"/>
                        <a class="gmail my-auto ms-2" href="mailto:{{ $appSetting->email1 }}">{{ $appSetting->email1 }}</a>
                    </div>
                    <div class="d-flex m-auto mt-1">
                        <img src="https://img.icons8.com/material-outlined/30/FFFFFF/whatsapp--v1.png"/>
                        <a class="gmail my-auto ms-2" href="https://wa.me/{{ $appSetting->phone1 }}?text=We%20will%20help%20you!">{{ $appSetting->phone1 }}</a>
                    </div>
                    {{--  <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="#" class="text-white">Sitemaps</a></div> --}}
                </div>
                <div class="col-md-4">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    {{-- <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div> --}}
                    {{-- <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div> --}}
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals Products</a></div>
                    {{-- <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Featured Products</a></div> --}}
                    <div class="mb-2"><a href="{{ url('/most-buyed') }}" class="text-white">Most Buyed Products</a></div>
                    <div class="mb-2"><a href="{{ url('/top-rated') }}" class="text-white">Top Rated Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                    <div class="mb-2"><a href="{{ url('/wishlist') }}" class="text-white">Wishlist</a></div>
                </div>
                
                <!-- <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa-solid fa-location-dot"></i> 
                            {{ $appSetting->address ?? 'address' }} {{-- #444, some main road, some area, some street, bangalore,
                            india - 560077 --}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone 1' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email 1' }}
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    {{-- <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if ($appSetting->facebook)
                            <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                            <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
