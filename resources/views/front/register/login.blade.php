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
                <h3 class="tittle" style="margin-bottom: 30px; color: red;">You have to login to complete your valuable order. If you are not registered then you have to register first.</h3>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <div class="panel-body">
                            <h2 class="tittle" style="margin-bottom: 30px;">Login Form</h2>
                            <form action="{{ url('/customer-login') }}" class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"/>
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control"/>
                                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-3">
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"/>
                                    </div>
                                    <ul style="list-style-type:none;">
                                        <li><a href="{{ url('/register-form') }}" class="btn btn-success">Create New Account</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection