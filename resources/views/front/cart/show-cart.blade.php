@extends('front.master')
@section('content')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Cart</span></h3>
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
                <h2 class="tittle" style="margin-bottom: 30px;">Cart Show</h2>
                <table class="table table-bordered table-dark" style="border-radius: 7px;">
                    <thead>
                    <tr>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">SL NO</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Product Id</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Product Name</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Product Price</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Product Quantity</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Total Price</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Image</th>
                        <th scope="col" style="color: white; background: #343A40; text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @php($sum= 0)
                    @php($discount= 0)
                    @php($tax= 0)
                    @foreach($cartProducts as $cartProduct)
                        <tr>
                            <th style="color: white; background: #343A40;" scope="row">{{ $i++ }}</th>
                            <td style="color: white; background: #343A40;">{{ $cartProduct->id }}</td>
                            <td style="color: white; background: #343A40;">{{ $cartProduct->name }}</td>
                            <td style="color: white; background: #343A40;">{{ $cartProduct->price }}</td>
                            <td style="color: white; background: #343A40;">
                                <form action="{{ url('/update-cart-product') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input style="color: white; background: #343A40;" type="text" name="qty" value="{{ $cartProduct->quantity }}"/>
                                    <input type="hidden" name="productId" value="{{ $cartProduct->id }}"/>
                                    <input style="color: white; background: #343A40; border-radius: 6px;" type="submit" value="Update" name="btn"/>
                                </form>
                            </td>
                            <td style="color: white; background: #343A40;">{{ $totalPrice= $cartProduct->price*$cartProduct->quantity }}</td>
                            <td style="color: white; background: #343A40;"><img src="{{ asset($cartProduct->attributes->image) }}" width="50px" height="50px" alt=""></td>
                            <td style="color: white; background: #343A40;">
                                <a href="{{ url('/delete-cart-product/'.$cartProduct->id) }}" class="btn btn-danger btn-xs" title="Delete Cart Product" onclick="return confirm('Are You sure to delete this!!')">
                                    <span><i class="glyphicon glyphicon-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                        @php($sum= $sum + $totalPrice)
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="new-arrivals-w3agile">
        <div class="content">
            <div class="container">
                <table class="table table-bordered table-dark">
                    <tbody>
                    <tr>
                        <th>Sub Total</th>
                        <td>BDT {{ $sum }}</td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>BDT {{ $discount }}</td>
                    </tr>
                    <tr>
                        <th>Tax</th>
                        <td>BDT {{ $tax }}</td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td>BDT.{{ $grandTotal= $sum - ($discount + $tax) }}</td>
                        {{ Session::put('grand_total', $grandTotal) }}
                    </tr>
                    </tbody>
                </table>
                <a href="{{ url('/') }}" class="btn btn-success">Continue Shopping</a>
                @if(Session::get('customerId') && Session::get('shippingId'))
                    <a href="{{ url('/payment-info') }}" class="btn btn-success">Checkout</a>
                @elseif(Session::get('customerId'))
                    <a href="{{ url('/shipping-info') }}" class="btn btn-success">Checkout</a>
                @else
                    <a href="{{ url('/checkout') }}" class="btn btn-success">Checkout</a>
                @endif
            </div>
        </div>
    </div>
@endsection