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
                <form action="{{ route('mawb.index') }}" method="GET" role="search">

                    <div class="input-group">
                    <a href="{{ route('mawb.index') }}" class=" mr-2 mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                        <input type="text" class="form-control mr-3" name="term" placeholder="Tìm kiếm Kho" id="term">
                        <span class="input-group-btn mr-4  mt-1">
                            <button class="btn btn-info" type="submit" title="Tìm kiếm Kho">
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
                <h2>Kho Cargo </h2>
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
                            <a class="btn btn-sm btn-primary" href="{{ route('mawb.create') }}">Tạo Kho</a>
                         
    </div>
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            <th>No</th>
            <th>Tên Kho</th>
            <th>Mã xuất kho</th>
            <th>Ngày xuất kho</th>
            <th>Mã chuyến bay</th>
            <th>Action</th>
        </tr>
        @php
        $start_no=0;
        @endphp
        @foreach ($mawbs as $mawb)
            <tr>
                <td>{{++$start_no}}</td>
                <td>{{$mawb->name}}</td>
                <td>{{$mawb->code}}</td>
                <td>{{$mawb->date_inventory}}</td>
                <td>{{$mawb->code_flight}}</td>
                <td>
               
                    <form action="{{ route('mawb.edit',$mawb->id) }}" method="POST" style="display:inline;">
                   
                     <a href="{{route('mawb.show',$mawb->id)}}"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('mawb.edit',$mawb->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                    
                    <style>
                        .a{font-size: 13px;}
                    </style>
                   
                    {!! Form::open(['method' => 'DELETE','route' => ['mawb.destroy', $mawb->id],'style'=>'display:inline']) !!}
                    <button onclick="return confirm('Bạn có muốn xóa Kho này không?');"  type="submit" class="btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    </button>  
                      {!! Form::close() !!}
                   
            </tr>
        @endforeach
    </table>

    {{ $mawbs->links('pagination')}}
    @include('layouts.footers.auth')
@endsection

