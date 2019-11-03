<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use App\customer;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('front.checkout.checkout');
    }
    public function saveCustomerInfo(Request $request){
        $this->validate($request, [
            'first_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'last_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'phone_number'=>'required|size:11|regex:/(01)[0-9]{9}/',
            'email'=>'required|email|unique:customers,email',
            'address'=>'required|regex:/^[\pL\s\-]+$/u',
            'password'=>'required|max:10|min:6',
            'confirm_password'=>'required|max:10|min:6'

        ]);
        $customer= new customer();
        $customer->first_name= $request->first_name;
        $customer->last_name= $request->last_name;
        $customer->phone_number= $request->phone_number;
        $customer->email= $request->email;
        $customer->address= $request->address;
        $customer->password= bcrypt($request->password);
        $customer->save();

        $customerId= $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customer_name', $customer->first_name.' '.$customer->last_name);
        return redirect('/shipping-info');
    }
    public function showShippingInfo(){
        $customerId= Session::get('customerId');
        $customerInfo= customer::find($customerId);
        return view('front.checkout.shipping-info', ['customerInfo'=>$customerInfo]);
    }
    public function customerLogin(Request $request){
        $customer= customer::where('email', $request->email)->first();
        if ($customer){
            if (password_verify($request->password, $customer->password)){
                Session::put('customerId', $customer->id);
                Session::put('customer_name', $customer->first_name.' '.$customer->last_name);
                return redirect('/shipping-info');
            }
            else{
                return redirect('/checkout')->with('message', 'Password invalid');
            }
        }
        else{
            return redirect('/checkout')->with('message', 'Email invalid');
        }
    }
    public function shippingInfoSave(Request $request){
        $shippingInfo= new Shipping();
        $shippingInfo->full_name= $request->full_name;
        $shippingInfo->email= $request->email;
        $shippingInfo->phone_number= $request->phone_number;
        $shippingInfo->address= $request->address;
        $shippingInfo->save();
        $shippingId= $shippingInfo->id;
        Session::put('shippingId', $shippingId);
        return redirect('/payment-info');
    }
    public function showPaymentInfo(){
        return view('front.checkout.payment-content');
    }
    public function saveOrderInfo(Request $request){
        $paymentType= $request->payment_type;
        if ($paymentType == 'Cash On Delivery'){
            $order= new Order();
            $order->customer_id= Session::get('customerId');
            $order->shipping_id= Session::get('shippingId');
            $order->order_total= Session::get('grand_total');
            $order->save();
            $orderId= $order->id;

            $payment= new Payment();
            $payment->order_id= $orderId;
            $payment->payment_type= $paymentType;
            $payment->save();

            $cartProducts = Cart::getContent();
            foreach ($cartProducts as $cartProduct){
                $orderDetail= new OrderDetail();
                $orderDetail->order_id= $orderId;
                $orderDetail->product_id= $cartProduct->id;
                $orderDetail->product_name= $cartProduct->name;
                $orderDetail->selling_price= $cartProduct->price;
                $orderDetail->product_quantity= $cartProduct->quantity;
                $orderDetail->save();
            }
            Cart::clear();
            return redirect('/');
        }
        elseif ($paymentType == 'BKash'){

        }
        elseif ($paymentType == 'Paypal'){

        }
        else{

        }
    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customer_name');
        Session::forget('shippingId');
        Session::forget('grand_total');
        return redirect('/');
    }
    public function customerLoginForm(){
        return view('front.register.login');
    }
    public function customerRegisterForm(){
        return view('front.register.register');
    }
}
