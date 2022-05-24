@extends('layouts.app')

@section('content')
    @include('layouts.headers.app')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">
    <div>
        <div class="mx-auto pull-right" style="margin-left: 1rem!important;">
            <div class="">
                <form action="" method="GET" role="search">

                    <div class="input-group">
                    <a href="" class=" mr-2 mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                        <input type="text" class="form-control mr-3" name="term" placeholder="Search Order" id="term">
                        <span class="input-group-btn mr-4  mt-1">
                            <button class="btn btn-info" type="submit" title="Search Order">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            
            <th>No</th>
            <th>Tên</th>
            <th>Phone</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        @php
        $count=1
        @endphp
        @foreach ($receivers as $receiver)
            <tr>
               
                <td>{{$count++}}</td>
                <td>{{$receiver->name}}</td>
                <td>{{$receiver->phone}}</td>
                <td>{{$receiver->address}}</td>
                <td>{{$receiver->created_at}}</td>
                <td>
               
                    <form action="/receivers/{{$receiver->id}}/edit" method="POST" style="display:inline ;">
                        <a href="./receivers/{{$receiver->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                    <style>
                        .a{font-size: 13px;}
                    </style>
                     @can('receiver-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['receivers.destroy', $receiver->id],'style'=>'display:inline']) !!}
                    <button onclick="return confirm('Bạn có muốn người nhận này không?');"  type="submit" class="btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    </button>  
                      {!! Form::close() !!}
                    @endcan
                </td>
               
            </tr>
        @endforeach
    </table>
    {{ $receivers->links('pagination')}}
    @include('layouts.footers.auth')
@endsection

