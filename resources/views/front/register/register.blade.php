@extends('front.master')
@section('content')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Registration</span></h3>
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
                <h3 class="tittle" style="margin-bottom: 30px; color: red;">You are not registered yet now please register here.</h3>
                <div class="row">
                    <h2 class="tittle" style="margin-bottom: 30px;">Registration Form</h2>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <div class="panel-body">
                            <form action="{{ url('/new-customer') }}" class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-3">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="first_name" class="form-control"/>
                                        {{ $errors->has('first_name') ? $errors->first('first_name') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="last_name" class="form-control"/>
                                        {{ $errors->has('last_name') ? $errors->first('last_name') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone_number" class="form-control"/>
                                        {{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"/>
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" name="address" class="form-control"></textarea>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control"/>
                                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="confirm_password" class="form-control"/>
                                        {{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration"/>
                                    </div>
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