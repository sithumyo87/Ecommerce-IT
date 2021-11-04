@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background: #CAD5E2">Order Form</div>
                    <form action="{{route('')}}" method="POST">@csrf
                    <div class="card-body">
                        <div class="list-group text-white">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="list-group text-white">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="list-group text-white">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" >
                        </div>
                        <div class="list-group text-white">
                            <label for="address">Address</label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control" ></textarea>
                        </div>
                        <div class="list-group text-white">
                            <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="0">
                        </div>
                        <div class="list-group text-white">
                            <label for="message">Any Message</label>
                            <textarea name="message" id="" cols="30" rows="3" class="form-control" ></textarea>
                        </div>
                        <button class="btn btn-danger mt-3">Order Now</button>
                    </div>
                    </form>
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
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header" style="background: #CAD5E2">Product Detail</div>

                    <div class="card-body  text-white">
                        <img class="img-thumbnail" src="{{Storage::url($item->image)}}"   alt="Card image cap">
                        <h3 class="mt-3">Product Name : {{$item->name}}</h3>
                        <h5>Description : {{$item->description}}</h5>
                        <h5>Price : <span class="text-danger">{{$item->price}} MMK</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
