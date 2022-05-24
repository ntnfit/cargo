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
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('agents.index') }}"> Back </a>
    </div>
    <div class="col-4 text-right">
                           
                            <button id="huy" class="btn btn-sm btn-warning" disabled="true"> Hủy MAWB </button>
                            <button id="label" class="btn btn-sm btn-primary" disabled="true"> In label </button>
                         
    </div>
    <table class="table table-bordered table-responsive-lg" style="margin-left: 15px;">
        <tr>
            <th> <input id="select-all" type="checkbox" class="checkbox" onclick="toggle(this);"></th>
            <th>No</th>
            <th>Mã đơn hàng</th>
            <th>Ngày gửi hàng</th>
            <th>Người gửi</th>
            <th>Người nhận</th>
            <th>Cận nặng</th>
            <th>Giá trị</th>
            <th>Ngày tạo</th>
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
            </tr>
        @endforeach
    </table>
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

// get rows
var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });
        return selected;
    }
// call function process MAWB
    $('#huy').on('click', function() {
    var ids = selectedRows().join();
   // document.cookie = `huy=`+ids;
    x='{{$id}}';
     var urls = '{{route("cancel", ":id")}}';
        urls = urls.replace(':id',x );
        $.ajax({
        url: urls,
        data:
        {
            'item':ids
        } ,
        type: "GET",
        success: function(data){
            alert("Hủy xuất kho thành công!!");
            location.reload();
        }, 
        error: function(){
              alert("failure From php side!!! ");
         }
        }); 
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
        document.getElementById("huy").disabled = false;
        document.getElementById("label").disabled = false;
    }
    else
    {
        document.getElementById("huy").disabled = true;
        document.getElementById("label").disabled = true;
    }
    });
    </script>
    @include('layouts.footers.auth')
@endsection