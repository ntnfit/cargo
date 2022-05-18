@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
@section('content')
@include('layouts.headers.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chỉnh sửa thông tin Cargo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:history.back()" title="Go back"> Back </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif

  
    {!! Form::model($customers, ['method' => 'PATCH','route' => ['customers.update', $customers->id]]) !!}
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$customers->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location</strong>
                    <input type="text" name="address" class="form-control" placeholder="location"
                        value="{{$customers->address}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>phone</strong>
                    <input type="text" name="phone" class="form-control" placeholder="phone"
                        value="{{$customers->phone}}">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


    @include('layouts.footers.auth')
    
@endsection
