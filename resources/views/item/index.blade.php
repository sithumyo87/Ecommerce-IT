@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <h4 class="card-header">
                        All Products
                        <a href="{{route('item.create')}}"><button class="btn btn-success float-right">Add Product</button></a>
                    </h4>

                    <div class="card-body">
                        @if(session('message'))
                            <div class="mt-3">
                                <p class="alert alert-success">{{session('message')}}</p>
                            </div>
                        @endif
                        <table class="table table-striped text-white table-bordered">
                            <thead class="table-light">
                            <tr >
                                <td>No</td>
                                <td>Product Name</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Category</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($items as $key=>$item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <img src="{{Storage::url($item->image)}}" alt="" width="80px" class="img-thumbnail" height="80px">
                                    </td>
                                    <td style="width: 20%">{{$item->description}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>
                                        <a href="{{route('item.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>

                                        <form action="">
                                            <a href="{{route('item.delete',$item->id)}}"><button class="btn btn-danger">Delete</button></a>
                                            <div class="modal{{$item->id}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal{{$item->id}}" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Delete Confirmation</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
