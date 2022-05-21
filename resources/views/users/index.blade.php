@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    @include('layouts.headers.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User</h2>
            </div>
@if (count($errors) > 0)
  <div class="alert alert-danger">
        <strong>Whoops!</strong>Something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif      
    
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col" style="margin-top:90px">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            
                        </div>
                        <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add user</a>
                                               
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-body p-0">
                
                    
<div class="card bg-secondary shadow border-0">
    
    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
<div class="row">
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','autocomplete'=>'off','class' => 'form-control','require')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','autocomplete'=>'off','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Role:</strong>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple','id'=>'role','style'=>'width:250px')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Agent:</strong>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">        
    <select class="form-control" id="agent" name="agent_id" style="width:250px">
            <option value="" selected></option>
            @foreach($agents as $agent)
            <option value="{{$agent->id}}">{{$agent->name}}</option>
            @endforeach
            </select>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
{!! Form::close() !!}
</div>
        </div>
    </div>
</div>
</div>

                </div>
                </div>
                </div>
                </div>
                        </div>
                    </div>
                </div>              
                <div class="col-12">
                </div>    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('success')}}
    </div>
    @endif
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Create At</th>
                                <th scope="col"></th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                                </td>
                                <td>
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                <button onclick="return confirm('Bạn có muốn xóa user này không?');"  type="submit" class="btn btn-danger"> Delete
                                </button>  
                                {!! Form::close() !!}
                                 @endcan   
                                </td>
                            </tr>
                         @endforeach
                     
                        </tbody>
                    </table>
                   
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
            </div>
        </div>
        {{$data->links('pagination')}}
       
    </div>
</div>
  
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$("#role").select2({
    placeholder: "Select role",
    allowClear: true,
    role: 'combobox'
  });
  $("#agent").select2({
    placeholder: "Select agent",
    allowClear: true,
    role: 'combobox'
  });
  </script>
    @include('layouts.footers.auth')
@endsection

