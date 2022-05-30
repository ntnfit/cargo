@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    @include('layouts.headers.app')
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('mawb.index') }}"> Back </a>
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
  <h1>Tạo Kho</h1>
  <div class="row">
    {!! Form::open(array('route' => 'mawb.store','method'=>'POST')) !!}
      @csrf
      <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Kho:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Tên Kho','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mã kho:</strong>
            {!! Form::text('code', null, array('placeholder' => 'Mã kho','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày xuất kho:</strong>
            {!! Form::date('date_inventory',null, array('placeholder' => 'Ngày xuất kho','class' => 'form-control','required' => '')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mã chuyến bay</strong>
            {!! Form::text('code_flight',null, array('placeholder' => 'Mã chuyến bay','class' => 'form-control','required' => '')) !!}
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
