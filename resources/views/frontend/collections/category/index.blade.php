@extends('layouts.main')
@section('title', 'All Categories')
@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>

            <div class="text-center">
                <div class="row row-cols-2 row-cols-lg-6 gx-2">
                    @forelse ($categories as $categoryItem)
                    <div class="col">
                        <div class="bg-light" style="height: 150px;">
                            <div class="card text-bg-light" style="height: 150px;">
                                <div style="height: 160px; max-width: 150px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
                                    <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                        <img src="{{ asset("$categoryItem->image") }}" style="max-height: 150px; width: 100%;" class="" alt="Laptop">
                                    </a>
                                </div>
                                <a class="text-decoration-none" href="{{ url('/collections/'.$categoryItem->slug) }}">
                                    <div class="card-body bg-white rounded-bottom py-2">
                                        <p class="brand mb-0" style="color: black; font-weight: 500;">
                                            {{$categoryItem->name}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Categories Available</h5>
                    </div>
                @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
