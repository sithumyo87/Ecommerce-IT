<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category){
            $items = Item::latest()->get();
            return view('frontend',compact('items'));
        }else{
            $items = Item::where('category',$request->category)->get();
            return view('frontend',compact('items'));
        }

    }
    public function order(Request $request,$id){
        $item = Item::find($id);
        return view('order',compact('item'));
    }
}
