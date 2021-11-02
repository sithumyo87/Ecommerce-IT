<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->get();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {

        $path = $request->image->store('public/image');
        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'image'=>$path,
        ]);
        return redirect()->route('item.create')->with('message','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return  view('item.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if($request->file()){
             $path = $request->image->store('public/image');
        }else{
            $path = $item->image;
        }
            $item->name = $request->name;
            $item->description = $request->description;
            $item->price=$request->price;
            $item->category=$request->category;
            $item->image=$path;
            $item->save();
        return redirect()->route('item.index')->with('message','Successfully Created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Hello";
    }
}
