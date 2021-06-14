@extends('layouts.payment')
@section('content')
@php
$stripe_key = 'put your publishable key here';
@endphp
<div class="container" style="margin-top:10%;margin-bottom:10%">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="">
            <p>{{$game->name}}</p>
        </div>
        <div class="card">
            <form action="{{route('payments.store', [$game->id, Auth::user()->id])}}"  method="post" id="payment-form">
                @csrf

                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{env('STRIPE_PUB_KEY')}}"
                            data-description="{{$game->description}}"
                            data-amount="{{$game->price * 100}}"
                            data-locale="auto"></script>

            </form>
        </div>
    </div>
</div>
</div>
@endsection

