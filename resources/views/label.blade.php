
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Label</title>
  <link href="labels.css" rel="stylesheet" type="text/css">
  <style>
    body {
	
		height:14.8cm;
        width: 10.5cm;
        margin:2px;
		margin-top:0.2px;
        }
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        height:14.8cm;
        width: 10.5cm;
        float: left;
        text-align: left;
        overflow: hidden;
		font-size:28px;
        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
  </style>

</head>

<body>
<input type="submit" class="dont-print" onclick="order_print()" value="Print"></button>
<br>
@foreach ($order_detail as $detail)
  <div class="label">
    <br>{{count($order_detail)}} Box(es)
    <br> <b style="font-size:60px">{{$orders->order_id}}</b> 
    <br> Người Nhận
    <br> Tên: Lê Như Ý
    <br> Địa Chỉ:{{$orders->name_receivers}}
    <br> Số Điện Thoại: {{$orders->phone_receivers}}
    <br>Cân Nặng: {{$detail->weight}}
	<br>Hàng Hóa: {{$detail->description}}
	<br>
  </div>
  <div class="page-break"></div>
 @endforeach
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  function order_print(){
	$('.dont-print').hide();
    window.print();
    $('.dont-print').show();
  }
</script>
</html>