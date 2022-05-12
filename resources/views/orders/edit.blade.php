@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ asset('assets/css/orders/create.css') }}" rel="stylesheet" type="text/css" >

@section('content')
@include('layouts.headers.app')
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back </a>
</div>
<div class="container">
  <div class="row">
    {!! Form::model($order, ['method' => 'PATCH','route' => ['orders.update', $order->id]]) !!}
      @csrf
      <div class="col"><span>Column</span>
        <label for="ShipDate">Shipping Date</label>
        <input id="ShipDate" class="form-control" name="shipdate" type="date" value="{{$order->shipdate}}"/>

        <label for="DelDate">Delivery date</label>
        <input id="DelDate" class="form-control" type="date" name="deldate" value="{{$order->deldate}}"/>
        <label for="sender">Sender</label>
        <a class="btn btn-sm btn-primary " href="#" id="OpenForm">Add</a> 
        <select id="sender" class="form-control" name="sender">
          <option value="{{$order->sender}}">{{$order->name_sender}}</option>
        </select>
       
        <label>Receiver</label>
        <a id="add_receiver" class="btn btn-sm btn-primary disabled" href="#">Add</a> 
        <select id="receiver" class="form-control" name="receiver">
          <option value="{{$order->receiver}}">{{$order->name_receivers}}</option>
        </select> 
        <div class="col2 text-left">
          <label for="service">Service</label>
          @if($order->service =='HCM')
            <input type="checkbox" class="radio" value="HCM" name="service[1][]" checked />HCM</label>
            <input type="checkbox" class="radio" value="TL" name="service[1][]" />TỈNH</label>
          @elseif($order->service =='TL')
            <input type="checkbox" class="radio" value="HCM" name="service[1][]"  />HCM</label>
            <input type="checkbox" class="radio" value="TL" name="service[1][]" checked />TỈNH</label>
          @else
          <input type="checkbox" class="radio" value="HCM" name="service[1][]"  />HCM</label>
          <input type="checkbox" class="radio" value="TL" name="service[1][]"  />TỈNH</label>
          @endif  
        </div>
        <label for="remark">Remark</label>
        <textarea  class="form-control"  name="remark"> </textarea>
        <label>Order value</label>
        <input  class="form-control" type="number" step="0.01" value="{{$order->value_order}}"name="value_order" require/>
        <label for="tax">Tax</label>
        <input  class="form-control" type="number" step="any" value="{{$order->tax}}" name="tax"/> 
        <label for="discount">discount</label>
        <input  class="form-control" type="number" step="any" value="{{$order->discount}}" name="discount" /> 
        <input class="form-control" id="hidden-weight" type="number" name="weight" value="{{$order->weight}}" step="any" hidden>
        <table class="table table-bordered" id="tbl_posts">
          <thead>
            <tr>
              <th>#</th>
              <th>Description</th>
              <th>Weight of Vacancies</th>
              <th>Action</th>
            </tr>   
          </thead>
          <tbody id="tbl_posts_body">
            @php
              $count=0
            @endphp
            @foreach($order_detail as $detail)
              <tr id="rec-{{ ++$count}}">
                <td><span class="sn">{{$count}}</span> </td>
                <td class="it"><input type="text" class="form-control"  value="{{$detail->description}}" name="order[{{$count}}][item]"></td>
                <td class="wg"><input type="number" step="0.01"  value="{{$detail->weight}}" onchange="totalweight()" class="form-control weight" name="order[{{$count}}][weight]"></td>
                <td><a class="btn btn-xs delete-record" data-id="{{$count}}"><i class="glyphicon glyphicon-trash" >x</i></a></td>
              </tr>
            @endforeach
          </tbody>
          <tr>
            <th></th>
            <th></th>
            <th style="color:red" ">
              <input class="form-control" id="total-weight" type="number" name="weight" value="{{$order->weight}}" step="any" disabled>
            </th>
          </tr>
        </table>
      </div>
        
      <div class="well clearfix">
        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
      </div>
      <div class="col-12 text-center">
        <button class=" btn btn-success "  type="submit">Save</button>
      </div>
    </form>

    <div style="display:none;">
      <table id="sample_table">
        <tr id="">
          <td><span class="sn"></span>.</td>
          <td class="it"></td>
          <td class="wg"></td>
          <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash" >x</i></a></td>
        </tr>
    </table>
    </div>
  </div>
</div>

	
<!--receiver-form-->
<div id="receiver-form" class="form">
  <div class="receiver_form_area">
    <button type="button" class="btn-close btn btn-danger"  aria-label="Close" id="close-r"></button>
    <div class="form_area_inner">
      <h3>Add receiver</h3>
      <form action="javascript:void(0)" method="POST" id="add-receiver">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" id="name-receiver" name="name" class="custom-inp" />
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" id="phone-receiver" name="phone" class="custom-inp" />
        </div>
        <div class="form-group">
          <label><Address></Address></label>
          <textarea id="address-receiver" class="custom-inp-txt" name="address" required></textarea>
        </div>
        <div>
          <button type="submit" class="btn btn-success" id="btn-save-receiver" value="addreceiver">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--sender-form-->
<div id="sender-form" class="form">
  <div class="sender_form_area">
  <button type="button" class="btn-close btn btn-danger"  aria-label="Close" id="close-s"></button>
    <div class="form_area_inner">
      <h3>Add sender</h3>
      <form action="javascript:void(0)" method="POST" id="add-sender">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" id="name-sender" name="name" class="custom-inp" required/>
        </div>
       
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" id="phone-sender"  name="phone" class="custom-inp" required />
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea id="address-sender" name="address"class="custom-inp-txt" required></textarea>
        </div>
       
        <div class="">
          <button type="submit" class="btn btn-success" id="btn-save-sender" value="addsender">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $("#sender").select2({
    placeholder: "Select sender",
    allowClear: true
  });
  $("#receiver").select2({
    placeholder: "Select receiver",
    allowClear: true
  });
  $(document).ready(function(){
    $("#OpenForm").click(function(){
      $(".sender_form_area").animate({
        width: "toggle"
      });
      $(".receiver_form_area").animate({
        width: 'hide'
      });
    });
    $("#close-s").click(function(){
      $(".sender_form_area").animate({
        width: "toggle"
      });
    });
    $("#add_receiver").click(function(){
      $(".receiver_form_area").animate({
        width: "toggle"
      });
      $(".sender_form_area").animate({
        width: 'hide'
      });
    });
  });
  $("#close-r").click(function(){
    $(".receiver_form_area").animate({
      width: "toggle"
    });
  });
  $("#sender").on('select2:select', function (e) {
    var a=$("#sender").val();
    var e = document.getElementById("sender");
    var sender = e.value;
    if(sender != "") {
      $("#add_receiver").removeClass('btn btn-sm btn-primary disabled').addClass('btn btn-sm btn-primary');
      $.get('/receivers/'+a,function(data){
        $("#receiver").html(data);
      })
    }
  });
  $("#sender").on('select2:clear', function (e) {
    var a=$("#sender").val();
    $("#add_receiver").removeClass('btn btn-sm btn-primary').addClass('btn btn-sm btn-primary disabled');
    $.get('/receivers/'+a,function(data){
      $("#receiver").html(data);
    })
  });
  $( document ).ready(function() {
    $.get("{{route('customers.index')}}",function(data){
      $('#sender').append(data);   
    });
  });
</script>
<script>
  var count = 0;
  jQuery(document).delegate('a.add-record', 'click', function(e) {
    var it='<input type="text" class="form-control" name="order['+count+'][item]">';
    var wg='<input type="number" step="0.01" onchange="totalweight()" class="form-control weight" name="order['+count+'][weight]">';
    count++;
    e.preventDefault();   
    var content = jQuery('#sample_table tr'),
    size = jQuery('#tbl_posts >tbody >tr').length,
    element = content.clone();
    element.attr('id', 'rec-'+size);
    element.find('.delete-record').attr('data-id', size); 
    element.appendTo('#tbl_posts_body');
    element.find('.sn').html(size);
    element.find('.it').html(it);
    element.find('.wg').html(wg);
  });
  jQuery(document).delegate('a.delete-record', 'click', function(e) {
    e.preventDefault();    
    var didConfirm = confirm("Are you sure You want to delete");
    if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      console.log(id);
      jQuery('#rec-' + id).remove();
      //regnerate index number on table
      $('#tbl_posts_body tr').each(function(index) {
        //alert(index);
        $(this).find('span.sn').html(index+1);
      });
      return true;
    } else {
      return false;
    }
  });
</script>
<script>
  var tb = document.getElementById('tbl_posts'),
  dtotal = document.getElementById('total-weight'),
  tbody,
  total = 0;

  function totalweight() {
    total = 0;
    var els = document.getElementsByClassName("form-control weight");
    var a = 0;
    for(var i = 0; i < els.length; i++) {
      a += parseFloat(els[i].value);
    } 
    $('#total-weight').val(a);
    $('#hidden-weight').val(a) 
  //document.getElementById('total-weight').innerHTML='<b>Total:'+a+'</b>';
  } //getResults function
</script>
<script>
  $(document).ready(function($){
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 
    $('body').on('click', '#btn-save-sender', function (event) {
      var name = $("#name-sender").val();
      var phone = $("#phone-sender").val();
      var address = $("#address-sender").val();
      
      $("#btn-save-sender").html('Please Wait...');
      $("#btn-save-sender"). attr("disabled", true);
         
      // ajax
      $.ajax({
        type:"POST",
        url: "{{route('customers.store')}}",
        data: {
          name: name,
          phone: phone,
          address: address,
        },
        dataType: 'json',
        success: ({ data }) => {
          $("#sender").append("<option value='"+ data.id + "' selected>" + data.name + " - " + data.phone + "</option>").trigger('change');
          $("#add_receiver").removeClass('btn btn-sm btn-primary disabled').addClass('btn btn-sm btn-primary');
          $("#add-sender").trigger("reset");
          $("#btn-save-sender").html('Submit');
          $("#btn-save-sender"). attr("disabled", false);
        },
        error: (res, data) => {
          $("#add-receiver").trigger("reset");
          $("#btn-save-receiver").html('Submit');
          $("#btn-save-receiver"). attr("disabled", false);
        }
      });
    });

    $('body').on('click', '#btn-save-receiver', function (event) {
      var customer_id = $("#sender").val();
      var name = $("#name-receiver").val();
      var phone = $("#phone-receiver").val();
      var address = $("#address-receiver").val();
      
      $("#btn-save-receiver").html('Please Wait...');
      $("#btn-save-receiver"). attr("disabled", true);
          
      // ajax
      $.ajax({
        type:"POST",
        url: "{{route('receivers.store')}}",
        data: {
          customer_id:customer_id,
          name: name,
          phone: phone,
          address: address,
        },
        dataType: 'json',
        success: ({ data }) => {
          $("#receiver").append("<option value='"+ data.id + "' selected>" + data.name + " - " + data.phone + "</option>").trigger('change');
          $("#add-receiver").trigger("reset");
          $("#btn-save-receiver").html('Submit');
          $("#btn-save-receiver"). attr("disabled", false);
        },
        error: (res,data) => {
          $("#add-receiver").trigger("reset");
          $("#btn-save-receiver").html('Submit');
          $("#btn-save-receiver"). attr("disabled", false);
        }
      });
    });
  });

  $("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
      // the name of the box is retrieved using the .attr() method
      // as it is assumed and expected to be immutable
      var group = "input:checkbox[name='" + $box.attr("name") + "']";
      // the checked state of the group/box on the other hand will change
      // and the current value is retrieved using .prop() method
      $(group).prop("checked", false);
      $box.prop("checked", true);
    } else {
      $box.prop("checked", false);
    }
  });
</script>
@include('layouts.footers.auth')

@endsection
