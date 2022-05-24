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
                        <input type="text" class="form-control mr-3" name="term" placeholder="nhập tên agent" id="term">
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
                <h2>Agent Cargo </h2>
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
    <div class="col-8 text-left">
                            <a class="btn btn-sm btn-primary" href="{{ route('agents.create') }}">Tạo Agent</a>               
    </div>
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            
            <th>No</th>
            <th>Tên</th>
            <th>Code</th>
            <th>Phone</th>
            <th>Địa chỉ</th>
            <th>Action</th>
        </tr>
        @php
        $count=1
        @endphp
        @foreach ($agents as $agent)
            <tr>
               
                <td>{{$count++}}</td>
                <td>{{$agent->name}}</td>
                <td>{{$agent->code}}</td>
                <td>{{$agent->phone}}</td>
                <td>{{$agent->address}}</td>
                <td>
               
                    <form action="/agents/{{$agent->id}}/edit" method="POST" style="display:inline ;">
                        <a href="./agents/{{$agent->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                    <style>
                        .a{font-size: 13px;}
                    </style>
                     @can('agent-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['agents.destroy', $agent->id],'style'=>'display:inline']) !!}
                    <button onclick="return confirm('Bạn có muốn xóa agent này không?');"  type="submit" class="btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    </button>  
                      {!! Form::close() !!}
                    @endcan
                </td>
               
            </tr>
        @endforeach
    </table>
    {{ $agents->links('pagination')}}
    @include('layouts.footers.auth')
@endsection

