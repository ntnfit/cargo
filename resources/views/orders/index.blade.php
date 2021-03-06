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
                <form action="{{ route('orders.index') }}" method="GET" role="search">

                    <div class="input-group">
                    <a href="{{ route('orders.index') }}" class=" mr-2 mt-1">
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
    <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('orders.create') }}">T???o ????n h??ng</a>
                            <button id="process" class="btn btn-sm btn-warning" disabled="true"> Process MAWB </button>
                            <button id="label" class="btn btn-sm btn-primary" disabled="true"> In label </button>
                         
    </div>
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            <th> <input id="select-all" type="checkbox" class="checkbox" onclick="toggle(this);"></th>
            <th>No</th>
            <th>M?? ????n h??ng</th>
            <th>Ng??y g???i h??ng</th>
            <th>Ng?????i g???i</th>
            <th>Ng?????i nh???n</th>
            <th>C???n n???ng</th>
            <th>Gi?? tr???</th>
            <th>Ng??y t???o</th>
            <th>Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>
                  <input class="checkbox grid-row-checkbox" type="checkbox" data-id="{{ $order->order_id.'-'.$order->line }}">
                </td>
                <td>{{$start_no++}}</td>
                <td>{{$order->order_id.' - '.$order->line}}</td>
                <td>{{$order->shipdate}}</td>
                <td>{{$order->name_sender}}</td>
                <td>{{$order->name_receivers}}</td>
                <td>{{$order->cn}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->created_at}}</td>
                <td>
               
                    <form action="/orders/{{$order->id}}/edit" method="POST" style="display:inline;">
                   
                     <a href="invoice/{{$order->id}}"><i class="fa-solid fa-file-invoice"></i></a>
                        <a href="./orders/{{$order->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                    </form>
                    
                    <style>
                        .a{font-size: 13px;}
                    </style>
                    @can('order-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                    <button onclick="return confirm('B???n c?? mu???n x??a ????n h??ng n??y kh??ng?');"  type="submit" class="btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    </button>  
                      {!! Form::close() !!}
                    @endcan
            </tr>
        @endforeach
    </table>
    <div id="openModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Choose MAWB</h5>
      </div>
      <div class="modal-body">
          <form action="{{route('xuatkho')}}" method="post">
          @csrf
        <select name="kho" id="list_mawb" class="form-select">
             <option value=""></option>
             @foreach($mawbs as $mawb)
            <option value="{{$mawb->id}}">{{$mawb->name}}</option>
            @endforeach
        </select>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id ="mawb" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    width: 184px;
}
</style>
    {{ $orders->links('pagination')}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
            }

// model MAWB show
$('#process').on('click', function() {
$('#openModal').show();
});
$('#close').on('click', function() {
    $('#openModal').hide();
});
// get rows
var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });
        return selected;
    }
// call function process MAWB
    $('#mawb').on('click', function() {
    var ids = selectedRows().join();
    var ids = selectedRows().join();
    document.cookie = `mawb=`+ids;
    });
    $('#label').on('click', function() {
    var ids = selectedRows().join();
    document.cookie = `label=`+ids;
    console.log(ids);
    window.open(
  'http://dainamcargo.com/labels',
  '_blank' 
);
    //deleteItem(ids);
    });
    //Handle button process MAWB
    $(".checkbox").change(function() {
    if(this.checked) {
        document.getElementById("process").disabled = false;
        document.getElementById("label").disabled = false;
    }
    else
    {
        document.getElementById("process").disabled = true;
        document.getElementById("label").disabled = true;
    }
    });
      $("#list_mawb").select2({
          placeholder: "Select MAWB",
          allowClear: true,
          role: 'combobox'
      });
    </script>
    @include('layouts.footers.auth')
@endsection

