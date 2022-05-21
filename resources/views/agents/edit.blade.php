@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('assets/css/orders/create.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    @include('layouts.headers.app')
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('agents.index') }}"> Back </a>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <h1>Tạo Agent</h1>
  <div class="row">
  {!! Form::model($agents, ['method' => 'PATCH','route' => ['agents.update', $agents->id]]) !!}
      @csrf
      <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên agents:</strong>
            {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>code:</strong>
            {!! Form::text('code', null, array('placeholder' => 'code','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số điện thoại:</strong>
            {!! Form::text('phone',null, array('placeholder' => 'số điện thoại','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Địa chỉ:</strong>
            {!! Form::text('address',null, array('placeholder' => 'Địa chỉ','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</div>
      {!! Form::close() !!}
  </div>
@include('layouts.footers.auth')
@endsection
