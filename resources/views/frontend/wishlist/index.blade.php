@extends('layouts.main')
@section('title', 'Your Wishlist')
@section('content')

<style>
    .wish-del {
        background-color: #fff000;
        border-radius: 7px;
        color: #000;
        cursor: pointer;
        font-weight: 500;
        padding: 1px;
        text-align: center;
        transition: 200ms;
        width: auto;
        box-sizing: border-box;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .wish-del:not(:disabled):hover {
        background: #f4e603;
    }

    .wish-del:not(:disabled):focus {
        outline: 1;
        background: #f4e603;
        box-shadow: 0 0 10px 1px #40a8c5;
    }
</style>

<livewire:frontend.wishlist-show>

@endsection