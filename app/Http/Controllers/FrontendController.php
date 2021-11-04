<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $items = Item::latest()->paginate(12);
        return view('frontend',compact('items'));
    }
    public function order(Request $request,$id){
        $item = Item::find($id);
        return view('order',compact('item'));
    }
}
