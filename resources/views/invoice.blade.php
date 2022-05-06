<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Invoce Cargo</title>
  <link href="{{ asset('assets/css/invoice_cargo.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
  <table cellspacing="0" border="0">
    <colgroup span="4" width="94"></colgroup>
    <colgroup width="94"></colgroup>
    <colgroup span="2" width="94"></colgroup>
    <tr>
      <td colspan=3 rowspan=8 height="199" align="center" valign=middle>
        <font size=-2 color="#000000">
          <img src="{{($infors->logo)}}" width=282 height=175 hspace=1 vspace=15>
        </font>
      </td>
    </tr>
    <tr>
      <td></td>
      <td colspan=3 rowspan=2 align="left" valign=middle class="largeText"><b>INVOICE #No. {{$orders->order_id}}</b></td>
      <td></td>
    </tr>
    <tr></tr>
    <tr>
      <td></td>
      <td colspan=3 rowspan=1 align="left" valign=middle class="largeText"><b>Ngày Gửi Hàng: {{date("d/m/Y",strtotime($orders->shipdate))}}</b></td>
    </tr>
    <tr></tr>
    <tr>
      <td></td>
      <td colspan=3 rowspan=2 align="left" valign=middle class="largeText"><b>Ngày Chuyển Hàng: {{date("d/m/Y",strtotime($orders->deldate))}}</b></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
      <td colspan=3 height="20" align="left" valign=middle class="mediumText">
      {{$infors->location}}
      </td>
      <td colspan=2 align="left" valign=middle class="mediumText">Sài Gòn:</td>
      <td colspan=1 align="left" valign=middle class="mediumText">Tỉnh:</td>
    </tr>
    <tr>
      <td colspan=4 height="20" align="left" valign=middle class="mediumText">
        
      </td>
    </tr>
    <tr>
      <td colspan=4 height="20" align="left" valign=middle class="mediumText">
        Phone: {{$infors->phone}}
      </td>
      
      <td colspan=3 align="left" valign=middle class="mediumText">
        Giá Trị Hàng: {{$orders->total}}
      </td>
    </tr>
    <tr>
      <td height="20"></td>
    </tr>
    <tr>
      <td colspan=6 height="20" align="center" valign=middle class="mediumText">
        <b><u>Thông Tin Khách Hàng</u></b>
      </td>
    </tr>
    <tr>
      <td colspan=3 height="20" align="left" valign=middle class="mediumText">
        <u>From:</u> 
      </td>
      <td></td>
      <td colspan=3 align="left" valign=middle  class="mediumText">
        <p><u>To:</u> </p>
      </td>
    </tr>
    <tr>
      <td colspan=3 height="20" align="left" valign=middle  class="mediumText">
        <u>Người gửi:</u> {{$orders->name_sender}}
      </td>
      <td></td>
      <td colspan=3 align="left" valign=middle class="mediumText">
        <u>Người nhận:</u> {{$orders->name_receivers}}
      </td>
    </tr>
    <tr>
      <td colspan=3 height="20" align="left" valign=top class="mediumText">
        <u>Địa chỉ:</u> {{$orders->address_sender}}
      </td>
      <td></td>
      <td colspan=3 align="left" valign=top  class="mediumText">
        <u>Địa chỉ:</u> {{$orders->address_receivers}}
      </td>
    </tr>
    <tr>
      <td colspan=3 height="20" align="left" valign=top class="mediumText">
        <u>Số điện thoại:</u> {{$orders->phone_sender}}
      </td>
      <td></td>
      <td colspan=3 align="left" valign=top  class="mediumText">
        <u>Số điện thoại:</u> {{$orders->phone_receivers}}
      </td>
    </tr>
    <tr>
      <td height="20" align="left" valign=middle></td>
    </tr>    	
    <tr>
      <td colspan=6 height="20" align="center" valign=middle class="largeText">
        <b><u>Commodity - Kê Khai Mặt Hàng</u></b>
      </td>
    </tr>
    <tr>
      <td colspan=1 height="25" align="center" valign=middle class="mediumText">
        <b>Số Lượng</b>
      </td>
      <td colspan=1 align="center" valign=middle class="mediumText">
        <b>Mặt Hàng</b>
      </td>
      <td></td>
      <td></td>
      <td colspan=1 align="center" valign=middle class="mediumText">
        <b>Số Lượng</b>
      </td>
      <td colspan=1 align="center" valign=middle class="mediumText">
        <b>Mặt Hàng</b>
      </td>
    </tr>
    <tr>
      <td colSpan=3 valign=top>
        @for ($i = 0; $i < 6; $i++)
          <div class="row">
            <div class="column">…...............</div>
            <div class="as">…....................................</div>
          </div>
        @endfor
        </td>
      <td colSpan=1></td>
      <td colSpan=3 valign=top>
        @for ($i = 0; $i < 6; $i++)
          <div class="row">
            <div class="column">…...............</div>
            <div class="as">…....................................</div>
          </div>
        @endfor
        </td>
    </tr>
      <td height="20" align="left" valign=middle></td>
    </tr>
    <tr>
      <td colspan=2 align="left" valign=middle class="largeText">
        <b><u>Cân Nặng :</u>  {{$orders->weight}}</b>
      <td></td>
      <td class="mediumText">Subtotal:</td>
      <td align="right" class="smallText"> &nbsp;&nbsp; lb(s) x &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$</td>
      <td class="smallText">&nbsp;&nbsp;&nbsp;/lb &nbsp =    </td>
      <!-- <td colspan=3 align="left" valign=middle><b><u><font size=4 color="#000000">Tổng Số Thùng:</font></u></b></td> -->
    </tr>
    <tr>
      <td colspan=3></td>
      <td class="mediumText">Tax(es)</td>
    </tr>
    <tr>
      <td colspan=2 align="left" valign=middle class="largeText">
        <b><u>Tổng Số Thùng:</u> {{count($order_detail)}}</b>
      <td></td>
      <td class="mediumText">Discount:</td>
    </tr>
    <tr>
      <td colspan=3></td>
      <td colspan=3 align="left" valign=middle class="mediumText">
        <b>Total</b>
    </tr>
    <tr>
      <td height="20"></td>
    </tr>
    <tr>
      <td colspan=4 rowspan=2 height="30" align="left" valign=middle class="largeText">
        <b><u>LƯU Ý DÀNH CHO KHÁCH HÀNG</u></b>
      </td>
      <td colspan=2 rowspan=2 height="30" align="center" valign=middle class="largeText">
        <b><u>SIGNATURE</u></b>
      </td>
    </tr>
    @for ($i = 0; $i < 6; $i++)
      <tr><td height="20"></td></tr>
    @endfor
    <tr>
      <td colspan=6 rowspan=2 height="40" align="center" valign=middle class="mediumText">THANKS FOR YOUR BUSINESS</td>
    </tr>
  </table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
