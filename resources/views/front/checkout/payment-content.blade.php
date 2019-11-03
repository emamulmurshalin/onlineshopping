@extends('front.master')
@section('content')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Payment</span></h3>
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
                <h3 style="margin-bottom: 30px;">Please give us payment information to complete your valuable order.</h3>
                <div class="row">
                    <h2 class="tittle" style="margin-bottom: 30px;">Payment Form</h2>
                    <div class="col-sm-12">
                        <div class="panel-body">
                            <form action="{{ url('/new-order') }}" method="POST">
                                {{ csrf_field() }}
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Cash On Delivery</th>
                                        <td><input type="radio" name="payment_type" value="Cash On Delivery"/></td>
                                    </tr>
                                    <tr>
                                        <th>BKash</th>
                                        <td><input type="radio" name="payment_type" value="BKash"/></td>
                                    </tr>
                                    <tr>
                                        <th>Paypal</th>
                                        <td><input type="radio" name="payment_type" value="Paypal"/></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" class="btn btn-success" name="btn" value="Confirm Order"/></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection