@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" style="background: #CAD5E2">Category</div>

                    <div class="card-body">
                        <a href=""><li class="list-group-item list-group-item-action">Phone</li></a>
                        <a href=""><li class="list-group-item list-group-item-action">Laptop</li></a>
                        <a href=""><li class="list-group-item list-group-item-action">Phone Cover</li></a>
                        <a href=""><li class="list-group-item list-group-item-action">Power Bank</li></a>
                        <a href=""><li class="list-group-item list-group-item-action">Headphone</li></a>
                        <a href=""><li class="list-group-item list-group-item-action">Charging</li></a>

                    </div>
                </div>
                @if(session('message'))
                    <div class="mt-3">
                        <p class="alert alert-success">{{session('message')}}</p>
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="card mt-3">
                        <div class="card-body ">
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
            <div class="col-md-9">
                <div class="card bg-dark">
                    <div class="card-header" style="background: #CAD5E2">All Products</div>

                    <div class="card-body bg-dark">
                        <div class="row bg-dark">
                            @foreach($items as $item)
                            <div class="col-md-3 text-center text-white bg-dark mt-4">
                                <div class="card border-dark rounded-1">
                                    <img class="card-img-top" src="{{Storage::url($item->image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">Price - {{$item->price}} MMK</p>
                                        <a href="{{route('frontend.order',$item->id)}}" class="btn btn-danger" style="width: 100px" >Order Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-3 d-flex justify-content-center bg-dark g-0 g-md-1" style="font-size: 18px;">
                            {{$items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
