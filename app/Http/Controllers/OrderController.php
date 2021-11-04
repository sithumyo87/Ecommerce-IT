<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();
        return view('order.index',compact('orders'));
    }
    public function store(OrderStoreRequest $request){
        if($request->quantity < 0){
            return back()->with('errmessage','Not Be Negative Value');
        }
        Order::create([
           'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'quantity'=>$request->quantity,
            'message'=>$request->message,
        ]);
        return back()->with('message','Successfully Ordered');

    }
    public function check(Request $request,$id){
        $pizza = Order::where('id',$id)->update(['status'=>$request->status]);
        return back();

    }
    public function show($id){
        $order = Order::find($id);
        return view('order.show',compact('order'));
    }

}
