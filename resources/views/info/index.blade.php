@extends('layouts.app')

@section('content')
    @include('layouts.headers.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Infors Cargo </h2>
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
            <th>Name</th>
            <th>Location</th>
            <th>Phone</th>
            <th>email</th>
            <th>logo</th>
            <th>Actions</th>
        </tr>
        @php
        $count=0
        @endphp
        @foreach ($Infors as $Infor)
            <tr>
                <td>{{$count+1}}</td>
                <td>{{$Infor->name}}</td>
                <td>{{$Infor->location}}</td>
                <td>{{$Infor->phone}}</td>
                <td>{{$Infor->email}}</td>
                <td>
                    <img src="{{asset($infors->logo)}}" alt="logo" style="max-height:100px"></td>
                <td>
                    <form action="/infor/{{$Infor->id}}/edit" method="POST">
                        <a href="./infor/{{$Infor->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $Infors->links() !!}
    @include('layouts.footers.auth')
@endsection
