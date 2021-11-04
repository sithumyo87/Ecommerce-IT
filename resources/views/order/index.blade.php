@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <h4 class="card-header">
                        All Orders
                        <a href="{{route('item.create')}}"><button class="btn btn-success float-right ml-2">Add Product</button></a>
                        <a href="{{route('item.index')}}"><button class="btn btn-success float-right">View Product</button></a>
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
                                <td>Customer Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Quantity</td>
                                <td>Message</td>
                                <td>Status</td>
                                <td>Accept</td>
                                <td>Reject</td>
                                <td>Completed</td>
                            </tr>
                            @foreach($orders as $order)
                                <tr >
                                    <td>No</td>
                                    <td>Customer Name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Address</td>
                                    <td>Quantity</td>
                                    <td>Message</td>
                                    <td>Status</td>
                                    <td>Accept</td>
                                    <td>Reject</td>
                                    <td>Completed</td>
                                </tr>
                            @endforeach
                            </thead>
                            <tbody >

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
