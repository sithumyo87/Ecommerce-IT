@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background: #CAD5E2">Menu</div>

                    <div class="card-body">
                        <a href="{{route('item.index')}}"><li class="list-group-item list-group-item-action">View</li></a>
                        <a href="{{route('item.create')}}"><li class="list-group-item list-group-item-action">Create</li></a>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #CAD5E2">Product Create Form</div>

                    <div class="card-body">
                        <form action="{{route('item.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="name" class="text-white">Product Name</label>
                            <input type="text" name="name" placeholder="Enter Product Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-white">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="text-white">Price</label>
                            <input type="text" name="price" placeholder="Enter Price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category" class="text-white">Category</label>
                            <select name="category" class="form-control" style="color: grey">
                                <option value="phone">Phone</option>
                                <option value="laptop">Laptop</option>
                                <option value="headphone">Head Phone</option>
                                <option value="charging">Charging</option>
                                <option value="cover">Cover</option>
                                <option value="powerbank">PowerBank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image" class="text-white">Image</label>
                            <input type="file" name="image"  class="form-control">
                        </div>
                        <button class="btn btn-danger">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
