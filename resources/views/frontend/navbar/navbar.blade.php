<link href="https://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">

<style>
    [tooltip] {
        position: relative;
        /* opinion 1 */
    }

    /* Applies to all tooltips */
    [tooltip]::before,
    [tooltip]::after {
        text-transform: none;
        /* opinion 2 */
        font-size: .9em;
        /* opinion 3 */
        line-height: 1;
        user-select: none;
        pointer-events: none;
        position: absolute;
        display: none;
        opacity: 0;
    }

    [tooltip]::before {
        content: '';
        border: 5px solid transparent;
        /* opinion 4 */
        z-index: 1001;
        /* absurdity 1 */
    }

    [tooltip]::after {
        content: attr(tooltip);
        /* magic! */

        /* most of the rest of this is opinion */
        font-family: Helvetica, sans-serif;
        text-align: center;

        /* 
            Let the content set the size of the tooltips 
            but this will also keep them from being obnoxious
            */
        min-width: 3em;
        max-width: 21em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 1ch 1.5ch;
        border-radius: .3ch;
        box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
        background: black;
        color: #fff;
        z-index: 1000;
        /* absurdity 2 */
    }

    /* Make the tooltips respond to hover */
    [tooltip]:hover::before,
    [tooltip]:hover::after {
        display: block;
    }

    /* don't show empty tooltips */
    [tooltip='']::before,
    [tooltip='']::after {
        display: none !important;
    }

    /* FLOW: UP */
    [tooltip]:not([flow])::before,
    [tooltip][flow^="up"]::before {
        bottom: 100%;
        border-bottom-width: 0;
        border-top-color: #333;
    }

    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::after {
        bottom: calc(100% + 5px);
    }

    [tooltip]:not([flow])::before,
    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::before,
    [tooltip][flow^="up"]::after {
        left: 50%;
        transform: translate(-50%, -.5em);
    }

    /* FLOW: DOWN */
    /*[tooltip][flow^="down"]::before {
        top: 100%;
        border-top-width: 0;
        border-bottom-color: black;
    }*/

    [tooltip][flow^="down"]::after {
        top: calc(100% + 15px);
    }

    [tooltip][flow^="down"]::before,
    [tooltip][flow^="down"]::after {
        left: 50%;
        transform: translate(-50%, .5em);
    }

    /* FLOW: LEFT */
    [tooltip][flow^="left"]::before {
        top: 50%;
        border-right-width: 0;
        border-left-color: #333;
        left: calc(0em - 5px);
        transform: translate(-.5em, -50%);
    }

    [tooltip][flow^="left"]::after {
        top: 50%;
        right: calc(100% + 5px);
        transform: translate(-.5em, -50%);
    }

    /* FLOW: RIGHT */
    [tooltip][flow^="right"]::before {
        top: 50%;
        border-left-width: 0;
        border-right-color: #333;
        right: calc(0em - 5px);
        transform: translate(.5em, -50%);
    }

    [tooltip][flow^="right"]::after {
        top: 50%;
        left: calc(100% + 5px);
        transform: translate(.5em, -50%);
    }

    /* KEYFRAMES */
    @keyframes tooltips-vert {
        to {
            opacity: .9;
            transform: translate(-50%, 0);
        }
    }

    @keyframes tooltips-horz {
        to {
            opacity: .9;
            transform: translate(0, -50%);
        }
    }

    /* FX All The Things */
    [tooltip]:not([flow]):hover::before,
    [tooltip]:not([flow]):hover::after,
    [tooltip][flow^="up"]:hover::before,
    [tooltip][flow^="up"]:hover::after,
    [tooltip][flow^="down"]:hover::before,
    [tooltip][flow^="down"]:hover::after {
        animation: tooltips-vert 300ms ease-out forwards;
    }

    [tooltip][flow^="left"]:hover::before,
    [tooltip][flow^="left"]:hover::after,
    [tooltip][flow^="right"]:hover::before,
    [tooltip][flow^="right"]:hover::after {
        animation: tooltips-horz 300ms ease-out forwards;
    }

    .dropdown:hover .dropdown-content {
        display: none;
    }

    nav .dropdown-content:before {
        position: absolute;
        content: '';
        height: 17px;
        width: 17px;
        background: white;
        right: 75.5px;
        top: 10px;
        transform: rotate(45deg);
        z-index: -1;
    }

    .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .dropbtn:hover {
        color: white;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 490px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        z-index: 2;
    }

    .dropdown-content .profile {
        padding: 0px;
        margin: 0;
        color: #1b9ec2;
        text-decoration: underline;
    }

    .dropdown-content .profile:hover {
        background-color: transparent !important;
        padding: 0;
        margin: 0;
        text-decoration: underline;
        color: #40a8c5;
    }

    .dropdown-content .seller:hover {
        background-color: transparent !important;
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

    .dropdown-content a {
        color: #1b1b1b;
        padding: 5.5px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        border-radius: 10px;
        width: 95%;
        margin: auto;
        font-size: 14.5px;
        margin-bottom: 2px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1 !important;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .settings a {
        background: transparent;
        border: 1px solid transparent;
        border-radius: 5px;
        padding: 5px;
    }

    .settings a:hover {
        background: #333;
        border: 1px solid transparent;
        border-radius: 5px;
        padding: 5px;
    }

    @media only screen and (max-width: 600px) {
        .tab {
            width: 30%;
        }

        .tabcontent {
            float: left;
            padding: 0px 12px;
            width: 70%;
            border-left: none;
            height: 300px;
        }
    }

    @media only screen and (min-width: 960px) {
        .dropdown-content {
            right: -25px;
        }

        nav .dropdown-content:before {
            position: absolute;
            content: '';
            height: 17px;
            width: 17px;
            background: white;
            right: 37px;
            top: -7px;
            transform: rotate(45deg);
            z-index: -1;
        }
    }

</style>

<nav class="container-fluid navbar-dark bg-dark py-2">
    <div class="row align-items-center">
        <div class="col-12 col-lg-2 m-auto" style="padding-bottom: 2px;">
            <span tooltip="Home" flow="down">
                <a class="navbar-brand m-auto py-2 px-2"
                    style="font-size: 25px; background: linear-gradient(to right, #f36625, white); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-family: 'Bukhari Script', sans-serif;"
                    href="/">
                    {{ $appSetting->website_name }}
                </a>
            </span>
        </div>

        <div class="col-12 col-lg-7 ms-auto mt-1 mt-lg-0">
            <!-- Search -->
            <div class="position-relative w-100">
                <form action="{{ url('search') }}" method="GET" class="d-flex" role="search">
                    <input name="search" value="{{ Request::get('search') }}" style="height: 41px; border-radius: 6px;"
                        class="form-control border border-0 ps-4" type="text" placeholder="Search" aria-label="Search">
                    <button style="border-radius: 0 6px 6px 0;"
                        class="btn btn-info position-absolute end-0 border border-0 align-self-center" type="submit">
                        <div>
                            <img src="https://img.icons8.com/sf-regular/29/null/search.png" />
                        </div>
                    </button>
                </form>
            </div>
            <!-- End Search -->
        </div>

        @guest
        <div class="settings col-12 col-lg-3 ms-auto text-end d-flex justify-content-around">
            <div class="position-relative">
                <a class="text-decoration-none text-white d-flex" href="{{ url('wishlist') }}">
                    <span tooltip="Wishlist" flow="down">
                        <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/hearts.png" /><span
                            class="align-bottom fw-semibold"></span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <livewire:frontend.wishlist-count>
                        </span>
                    </span>
                </a>
            </div>

            <!-- akun guest -->
            <div class="d-flex">
                @if (Route::has('register'))
                <a href="{{ route('register') }}" role="button" style="font-size: 15px;"
                    class="btn btn-outline-info btn-sm text-white align-self-center px-3 py-2">Daftar</a>
                @endif
                <div class="vr text-white mx-2"></div>
                @if (Route::has('login'))
                <a href="{{ route('login') }}" role="button" style="font-size: 15px;"
                    class="btn btn-info btn-sm text-light align-self-center px-3 py-2">Masuk</a>
                @endif
            </div>
            <!-- end akun guest -->

            <div class="position-relative">
                <a class="text-decoration-none text-white d-flex" href="{{ url('cart') }}">
                    <span tooltip="Cart" flow="down">
                        <img src="https://img.icons8.com/fluency-systems-regular/30/FFFFFF/shopping-cart.png" />
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <livewire:frontend.cart.cart-count>
                        </span>
                    </span>
                </a>
            </div>
        </div>
        @endguest

        @auth
        <div class="settings col-12 col-lg-2 ms-auto text-end d-flex justify-content-around">

            <div class="position-relative">
                <a class="text-decoration-none text-white d-flex" href="{{ url('wishlist') }}">
                    <span tooltip="Wishlist" flow="down">
                        <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/hearts.png" /><span
                            class="align-bottom fw-semibold"></span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <livewire:frontend.wishlist-count>
                        </span>
                    </span>
                </a>
            </div>

            <div class="dropdown">
                <a class="text-decoration-none text-white d-flex" style="cursor: pointer;">
                    <span tooltip="Your Account" flow="left">
                        <img src="https://img.icons8.com/puffy/30/FFFFFF/experimental-user-puffy.png" />
                    </span>
                </a>
                <div class="dropdown-content py-2 px-2 rounded" style="z-index: 999;">
                    <div class="d-flex bg-white rounded py-2 mb-3"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <img src="https://img.icons8.com/pastel-glyph/48/FFFFFF/gender-neutral-user.png"
                            class="rounded-circle ms-2 me-2" style="background-color: #707d9d; box-shadow: 0 0 10px 2px #d0d2d3;" />
                        <div class="row my-auto flex-grow-1">
                            <div class="col my-auto">
                                <h5 class="my-auto text-start">Hello, {{ Auth::user()->name }}</h5>
                            </div>
                            <div class="col my-auto">
                                <a class="profile my-auto text-end" style="font-size: 15px;"
                                    href="{{ url('profile') }}">
                                    Edit your profile here
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mx-auto">
                            <h5 class="mb-1">GoodFance Bag Seller Central</h5>
                            <a class="seller flex-grow-1" href="{{ url('seller/dashboard') }}" target="_blank">
                                <button class="button-32" role="button">Seller Central</button>
                            </a>
                        </div>
                        <div class="vr mx-2"></div>
                        <div class="flex-grow-1">
                            <a href="{{ url('orders') }}" style="font-size: 16px;">Orders</a>
                            <a href="{{ url('wishlist') }}" style="font-size: 16px;">Wishlist</a>
                            <a href="{{ url('cart') }}" style="font-size: 16px;">Cart</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="list" style="cursor: pointer; font-size: 16px;" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="position-relative">
                <a class="text-decoration-none text-white d-flex" href="{{ url('cart') }}">
                    <span tooltip="Cart" flow="down">
                        <img src="https://img.icons8.com/fluency-systems-regular/30/FFFFFF/shopping-cart.png" />
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <livewire:frontend.cart.cart-count>
                        </span>
                    </span>
                </a>
            </div>
        </div>
        @endauth
    </div>
</nav>

{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0 py-md-1 px-0 px-lg-2">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-grow-1 me-0 me-md-2">
            <a class="navbar-brand align-self-center" href="/">{{ $appSetting->website_name ?? 'website name' }}</a>
<a href="{{ url('wishlist') }}" style="font-size: 16px;" class="navbar-brand fw-semibold m-auto align-self-center">
    <i style="font-size: 23px;" class="fa-solid fa-heart me-1"></i>Wishlist (<livewire:frontend.wishlist-count>)
</a>
</div>

<!-- Search -->
<div class="position-relative w-100 mx-2">
    <form action="{{ url('search') }}" method="GET" class="d-flex" role="search">
        <input name="search" value="{{ Request::get('search') }}" style="height: 42px; border-radius: 999px;"
            class="form-control border border-0 ps-4" type="text" placeholder="Search" aria-label="Search">
        <button style="border-radius: 0 999px 999px 0;"
            class="btn btn-info px-3 position-absolute end-0 border border-0 align-self-center" type="submit">
            <div>
                <img src="https://img.icons8.com/sf-regular/30/null/search.png" />
            </div>
        </button>
    </form>
</div>
<!-- End Search -->

<div class="d-flex justify-content-between flex-grow-1 ms-0 ms-md-2 py-0">
    @guest
    <!-- akun guest -->
    <div class="d-flex mx-0 mx-md-2 py-1 py-lg-2">
        @if (Route::has('register'))
        <a href="{{ route('register') }}" role="button"
            class="btn btn-outline-info btn-sm fw-semibold text-white align-self-center px-3 py-2">Daftar</a>
        @endif
        <div class="vr text-white mx-2"></div>
        @if (Route::has('login'))
        <a href="{{ route('login') }}" role="button"
            class="btn btn-info btn-sm fw-semibold text-light align-self-center px-3 py-2">Masuk</a>
        @endif
    </div>
    <!-- end akun guest -->
    @endguest

    @auth
    <!-- akun auth -->
    <div class="dropdown">
        <a href="javascript:void(0)" class="text-start dropbtn dropdown-toggle"
            style="font-size: 12px; line-height: 1.2;">
            Hai, {{ Auth::user()->name }} <br>
            <span class="fw-semibold" style="font-size: 15px;">Your Account</span>
        </a>
        <div class="dropdown-content py-2 rounded">
            <a class="fw-normal" href="{{ url('profile') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a style="cursor: pointer;" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
    <!-- end akun auth -->
    @endauth

    <div class="align-self-center">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ url('cart') }}" class="d-flex align-items-end nav-link text-white">
                    <i style="font-size: 27px;" class="fa-solid fa-cart-shopping"></i>
                    <span style="font-size: 16px; margin-left: 2px;" class="align-text-bottom fw-semibold">Cart (
                        <livewire:frontend.cart.cart-count>)</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
</nav> --}}

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
