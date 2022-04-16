<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Invoce Cargo</title>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>

<table cellspacing="0" border="0">
	<colgroup span="4" width="94"></colgroup>
	<colgroup width="92"></colgroup>
	<colgroup span="2" width="94"></colgroup>
	<tr>
		<td colspan=3 rowspan=8 height="199" align="center" valign=middle><b><font size=-2 color="#000000"><br><img src="{{asset($infors->logo)}}" width=282 height=175 hspace=1 vspace=15>
		</font></b></td>
	</tr>
	@foreach ($orders as $order)
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		
		<td colspan=3 align="left" valign=middle><b><font face="Times New Roman" size=4 color="#000000">INVOICE #No. {{$order->order_id}} </font></b></td>
		<td  align="left" valign=middle><b><font face="Times New Roman" size=4 color="#000000">
		<input type="submit" class="dont-print" onclick="order_print()" value="Print"></button>
		</font></b></td>
		</tr>
	<tr>
		
	</tr>
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><b><font face="Times New Roman" size=4 color="#000000">Ngày Gửi Hàng:{{$order->shipdate}}</font></b></td>
		</tr>
	<tr>
		
	</tr>
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><b><font face="Times New Roman" size=4 color="#000000">Ngày Chuyển Hàng: {{$order->deldate}}</font></b></td>
		</tr>
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><b><font face="Times New Roman" size=3 color="#000000"><br></font></b></td>
		<td align="left" valign=middle><b><font face="Times New Roman" size=3 color="#000000"><br></font></b></td>
		<td align="left" valign=middle><b><font face="Times New Roman" size=3 color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=4 height="25" align="left" valign=middle>
		<font size=4 color="#000000">Street Address</font>
		</td>
		<td align="left" valign=middle><font size=4 color="#000000">Sài Gòn:</font></td>
		<td align="left" valign=middle><font size=4 color="#000000">Tỉnh:</font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=4 height="25" align="left" valign=middle><font size=4 color="#000000">{{$infors->location}}</font></td>
		
	</tr>
	<tr>
		<td colspan=4 height="25" align="left" valign=middle><font size=4 color="#000000">Phone: {{$infors->phone}}</font></td>
		<td colspan=3 align="left" valign=middle><font size=4 color="#000000">Giá Trị Hàng: {{$order->total}}</font></td>
		</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=7 height="28" align="center" valign=middle><b><u><font size=4 color="#000000">Thông Tin Khách Hàng</font></u></b></td>
		</tr>
		
           
		<tr>
		<td colspan=3 height="28" align="left" valign=middle><u><font face="Times New Roman" size=4 color="#000000">From:</font></u></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><u><font face="Times New Roman" size=4 color="#000000">To:</font></u></td>
		</tr>
	<tr>
		<td colspan=3 height="28" align="left" valign=middle><u><font face="Times New Roman" size=4 color="#000000">Người gửi: {{$order->name_sender}}</font></u></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><u><font face="Times New Roman" size=4 color="#000000">Người nhận: {{$order->name_receivers}}</font></u></td>
		</tr>
	<tr>
		<td colspan=3 rowspan=2 height="56" align="left" valign=top><u><font face="Times New Roman" size=4 color="#000000">Địa chỉ: {{$order->address_sender}}</font></u></td>
		<td align="left" valign=top><font size=4 color="#000000"><br></font></td>
		<td colspan=3 rowspan=2 align="left" valign=top><u><font face="Times New Roman" size=4 color="#000000">Địa chỉ: {{$order->address_receivers}}</font></u></td>
		</tr>
	<tr>
		<td align="left" valign=top><font size=4 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td colspan=3 height="28" align="left" valign=middle><u><font face="Times New Roman" size=4 color="#000000">Số điện thoại:{{$order->phone_sender}}</font></u></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><font face="Times New Roman" size=4 color="#000000">Số điện thoại: {{$order->phone_receivers}}</font></td>
		</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>    
        @endforeach
	
	<tr>
		<td colspan=7 height="28" align="center" valign=middle><b><u><font size=4 color="#000000">Commodity - Kê Khai Mặt Hàng</font></u></b></td>
		</tr>
		<tr>
		<td colspan=3 height="25" align="center" valign=middle><b><font size=4 color="#000000">Số Lượng</font></b></td>
		<td colspan=2 align="center" valign=middle><b><font size=4 color="#000000">Mặt Hàng</font></b></td>
		<td align="center" valign=middle><font size=4 color="#000000"><br></font></td>
		</tr>
		@foreach($order_detail as $detail)
		<tr>
		<td  colspan=3height="25" align="center" valign=bottom><font size=3 color="#000000">{{$detail->weight}}</font></td>
		<td colspan=2 align="center" valign=bottom><font size=3 color="#000000">{{$detail->description}}</font></td>
		</tr>
		@endforeach
	
		<td height="25" align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="center" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="center" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="center" valign=middle><font size=4 color="#000000"><br></font></td>
		<td align="center" valign=middle><font size=4 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=3 height="28" align="left" valign=middle><b><u><font size=4 color="#000000">Cân Nặng :</font></u></b></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td colspan=3 align="left" valign=middle><b><u><font size=4 color="#000000">Tổng Số Thùng:</font></u></b></td>
		</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=3 rowspan=2 height="46" align="center" valign=middle><b><u><font size=4 color="#000000">LƯU Ý DÀNH CHO KHÁCH HÀNG</font></u></b></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font size=4 color="#000000">Subtotal</font></td>
		<td align="right" valign=middle><font size=4 color="#000000">lbs</font></td>
		<td align="right" valign=middle><font size=4 color="#000000">/lbs</font></td>
	</tr>
	<tr>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font size=4 color="#000000">Tax(es)</font></td>
		<td align="left" valign=bottom><font size=4 color="#000000"><br></font></td>
		<td align="left" valign=middle><font size=4 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="26" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font size=4 color="#000000">Discount</font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font size=4 color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font size=4 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td colspan=3 rowspan=2 align="left" valign=middle><b><font size=4 color="#000000">Total</font></b></td>
		</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=3 rowspan=2 height="40" align="center" valign=middle><font face="Berlin Sans FB Demi" size=4 color="#000000">THANKS FOR YOUR BUSINESS</font></td>
		<td align="left" valign=middle><font color="#000000"><br></font></td>
		<td colspan=3 rowspan=2 align="center" valign=middle><font face="Modern Love Caps" size=4 color="#000000">SIGNATURE</font></td>
	</tr>
</table>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  function order_print(){
	$('.dont-print').hide();
    window.print();
    $('.dont-print').show();
  }
</script>