@extends('layouts.main')
@section('title', 'Cart List')
@section('content')
<style>
.toast {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s;
  animation: fadein 0.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {right: 0; opacity: 0;}
  to {right: 30px; opacity: 1;}
}

@keyframes fadein {
  from {right: 0; opacity: 0;}
  to {right: 30px; opacity: 1;}
}

.remove-Btn:hover {
  text-decoration: underline !important;
}
</style>

    <livewire:frontend.cart.cart-show>

@endsection