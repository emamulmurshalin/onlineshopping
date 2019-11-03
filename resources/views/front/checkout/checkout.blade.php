@extends('front.master')
@section('content')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <!--banner-->

    <div class="content">
        <div class="new-arrivals-w3agile">
            <div class="container">
                @if($message= Session::get('message'))
                    <h1>{{ $message }}</h1>
                @endif
            </div>
        </div>
    </div>

    <div class="content">
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h3 class="tittle" style="margin-bottom: 30px; color: red;">You have to login to complete your valuable order.</h3>
                <ul>
                    <li><a href="{{ url('/login-form') }}" class="btn btn-success">Login</a></li>
                </ul>
            </div>
        </div>
    </div>


@endsection