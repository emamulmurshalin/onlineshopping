@extends('front.master')
@section('content')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
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
                <h3 style="margin-bottom: 30px;">Welcome {{ Session::get('customer_name') }}. Please give us product shipping information to complete your valuable order. If your billing info and shipping info then just press Save Shipping Info button.</h3>
                <div class="row">
                    <h2 class="tittle" style="margin-bottom: 30px;">Shipping Form</h2>
                    <div class="col-sm-12">
                        <div class="panel-body">
                            <form action="{{ url('/new-shipping-info') }}" class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="full_name" class="form-control" value="{{ $customerInfo->first_name.' '.$customerInfo->last_name }}"/>
                                        {{ $errors->has('full_name') ? $errors->first('full_name') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone_number" class="form-control" value="{{ $customerInfo->phone_number }}"/>
                                        {{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ $customerInfo->email }}"/>
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" name="address" class="form-control">{{ $customerInfo->address }}</textarea>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Shipping Info"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection