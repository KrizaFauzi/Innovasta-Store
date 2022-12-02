<style>
    .nav-link:hover {
        background: transparent;
        border: 1px solid whitesmoke;
        color: white;
        border-radius: 5px;
    }

    .nav-link {
        background: transparent;
        border: 1px solid transparent;
        font-weight: 500;
        color: #f1f1f1;
        border-radius: 5px;
        font-size: 14.4px;
        padding-top: 1px;
        padding-bottom: 1px;
    }

    .nav-link .kategori:hover {
        background: transparent;
        border: 1px solid whitesmoke;
        color: white;
        border-radius: 5px;
    }

    .nav-link .kategori {
        background: transparent;
        border: 1px solid transparent;
        font-weight: 500;
        color: #f1f1f1;
        border-radius: 5px;
        font-size: 14.4px;
        padding-top: 1px;
        padding-bottom: 1px;
    }

    .list-kategori {
        padding-top: 7px;
        padding-bottom: 7px;
        color: black;
        font-size: 17px;
        font-weight: 500;
        border: 1px solid #b8beb2;
        border-radius: 7px;
    }

    .list-kategori:hover {
        box-shadow: 0 0 5px 0.1px #40a8c5;
        border-radius: 7px;
    }

    .fa-chevron-right {
        font-size: 15px;
    }

</style>

<div class="offcanvas offcanvas-start" data-bs-scroll="false" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header text-white" style="background-color: #131313;">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Semua Kategori</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @php
            $categories = DB::table('categories')->where('status','0')->get();
        @endphp
        <div class="row row-cols-1 row-cols-lg-2">
            @forelse ($categories as $categoryItem)
                <div class="col d-grid p-1">
                    <a class="list-kategori px-2 text-decoration-none" href="{{ url('/collections/'.$categoryItem->slug) }}" style="color: black;">
                        {{$categoryItem->name}}
                        <span class="float-end">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            @empty
            <div class="col-md-12">
                <h5>No Categories Available</h5>
            </div>
            @endforelse
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 py-0 py-lg-1">
    <div class="container-fluid d-flex">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ url('#categories') }}" class="nav-link kategori" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class="fa-solid fa-bars me-1"></i>Semua Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/featured-products') }}">Featured Products</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/most-buyed') }}">Most Buyed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/top-rated') }}">Top Rated</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
