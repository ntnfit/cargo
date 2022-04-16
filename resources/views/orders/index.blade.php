@extends('layouts.app')

@section('content')
    @include('layouts.headers.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order Cargo </h2>
            </div>
            
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('success')}}
    </div>
    @endif
    <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('orders.create') }}">Add Order</a>
    </div>
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            <th>No</th>
            <th>Order ID</th>
            <th>Ship Date</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Weight</th>
            <th>Package</th>
            <th>Amount</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
        @php
        $count=0
        @endphp
        @foreach ($orders as $order)
            <tr>
                <td>{{$count+1}}</td>
                <td>{{$order->order_id}}</td>
                <td>{{$order->shipdate}}</td>
                <td>{{$order->name_sender}}</td>
                <td>{{$order->name_receivers}}</td>
                <td>{{$order->weight}}</td>
                <td>{{$order->package}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form action="/orders/{{$order->id}}/edit" method="POST">
                        <a href="./orders/{{$order->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $orders->links('pagination')}}
    @include('layouts.footers.auth')
@endsection

