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
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                            Delete
                                        </button>
                                    </td>
                                    <form action="{{route('item.delete',$item->id)}}" method="POST">@csrf
                                        @method('DELETE')
                                        <div class="modal fade text-white" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header  bg-danger">
                                                        <h5 class="modal-title  bg-danger" id="exampleModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close  " data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="bg-danger text-white">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{route('item.delete',$item->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
