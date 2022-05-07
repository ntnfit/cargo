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
      <td colSpan=2 rowSpan=8 align="center" valign=middle>
        <font size=-2 color="#000000">
          <img src="{{($infors->logo)}}" width=250 height=200 hspace=8 vspace=8>
        </font>
      </td>
    </tr>
    <tr>
      <td></td>
      <td colSpan=3 rowSpan=2 align="left" valign=middle class="largeText"><b>INVOICE #No. {{$orders->order_id}}</b></td>
    </tr>
    <tr></tr>
    <tr>
      <td></td>
      <td colSpan=3 align="left" valign=middle class="largeText"><b>Ngày Gửi Hàng: {{date("d/m/Y",strtotime($orders->shipdate))}}</b></td>
    </tr>
    <tr></tr>
    <tr>
      <td></td>
      <td colSpan=3 rowspan=2 align="left" valign=middle class="largeText"><b>Ngày Chuyển Hàng: {{date("d/m/Y",strtotime($orders->deldate))}}</b></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
      <td colSpan=2 align="left" valign=middle class="mediumText">
        {{$infors->location}}
      </td>
      <td></td>
      <td colSpan=2 align="left" valign=top class="mediumText">Sài Gòn:</td>
      <td align="left" valign=top class="mediumText">Tỉnh:</td>
    </tr>
    <tr>
      <td colSpan=3 height="25" align="left" valign=middle class="mediumText">
        Phone: {{$infors->phone}}
      </td>
      <td colSpan=3 align="left" valign=middle class="mediumText">
        Giá Trị Hàng: {{$orders->total}}
      </td>
    </tr>
    <tr>
      <td height="25"></td>
    </tr>
    <tr>
      <td colSpan=6 height="25" align="center" valign=middle class="mediumText">
        <b><u>Thông Tin Khách Hàng</u></b>
      </td>
    </tr>
    <tr>
      <td colSpan=3 height="25" align="left" valign=middle class="mediumText">
        <u>From:</u> 
      </td>
      <td colSpan=3 align="left" valign=middle  class="mediumText">
        <p><u>To:</u> </p>
      </td>
    </tr>
    <tr>
      <td colSpan=3 height="25" align="left" valign=middle  class="mediumText">
        <u>Người gửi:</u> {{$orders->name_sender}}
      </td>
      <td colSpan=3 align="left" valign=middle class="mediumText">
        <u>Người nhận:</u> {{$orders->name_receivers}}
      </td>
    </tr>
    <tr>
      <td colSpan=3 height="30" align="left" valign=top class="mediumText">
        <u>Địa chỉ:</u> {{$orders->address_sender}}
      </td>
      <td colSpan=3 height="30" align="left" valign=top  class="mediumText">
        <u>Địa chỉ:</u> {{$orders->address_receivers}}
      </td>
    </tr>
    <tr>
      <td colSpan=3 height="25" align="left" valign=top class="mediumText">
        <u>Số điện thoại:</u> {{$orders->phone_sender}}
      </td>
      <td colSpan=3 align="left" valign=top  class="mediumText">
        <u>Số điện thoại:</u> {{$orders->phone_receivers}}
      </td>
    </tr>
    <tr>
      <td height="25" align="left" valign=middle></td>
    </tr>    	
    <tr>
      <td colSpan=6 height="25" align="center" valign=middle class="largeText">
        <b><u>Commodity - Kê Khai Mặt Hàng</u></b>
      </td>
    </tr>
    <tr>
      <td height="25" align="center" valign=middle class="mediumText">
        <b>Số Lượng</b>
      </td>
      <td align="center" valign=middle class="mediumText">
        <b>Mặt Hàng</b>
      </td>
      <td></td>
      <td align="center" valign=middle class="mediumText">
        <b>Số Lượng</b>
      </td>
      <td colSpan=2 align="center" valign=middle class="mediumText">
        <b>Mặt Hàng</b>
      </td>
    </tr>
    @for ($i = 0; $i < 6; $i++)
      <tr>
        <td align="center" valign=middle class="smallText commodittList">..................</td>
        <td align="center" valign=middle class="smallText commodittList">..................................</td>
        <td></td>
        <td align="center" valign=middle class="smallText commodittList">..................</td>
        <td colSpan=2 align="center" valign=middle class="smallText commodittList">..................................</td>
      </tr>
    @endfor
    <tr>
      <td height="25" align="left" valign=middle></td>
    </tr>
    <tr>
      <td colSpan=2 align="left" valign=middle class="largeText">
        <b><u>Cân Nặng :</u>  {{$orders->weight}}</b>
      </td>
      <td class="mediumText">Subtotal:</td>
      <td align="right" class="smallText">lb(s) &emsp; x</td>
      <td align="left" class="smallText">&emsp; $</td>
      <td align="left" class="smallText">/lb =</td>
    </tr>
    <tr>
      <td colSpan=2></td>
      <td class="mediumText">Tax(es)</td>
    </tr>
    <tr>
      <td colSpan=2 align="left" valign=middle class="largeText">
        <b><u>Tổng Số Thùng:</u> {{count($order_detail)}}</b>
      <td colSpan=4 class="mediumText underline">Discount:</td>
    </tr>
    <tr>
      <td colSpan=2></td>
      <td align="left" valign=middle class="mediumText">
        <b>Total</b>
    </tr>
    <tr>
      <td height="25"></td>
    </tr>
    <tr>
      <td colSpan=3 height="25" align="left" valign=middle class="largeText">
        <b><u>LƯU Ý DÀNH CHO KHÁCH HÀNG</u></b>
      </td>
      <td colSpan=3 align="center" valign=middle class="largeText">
        <b><u>SIGNATURE</u></b>
      </td>
    </tr>
    @for ($i = 0; $i < 6; $i++)
    <div>
      <tr>
          <td height="25"></td>
        </tr>
      </div>
    @endfor
    <tr>
      <td colSpan=6 rowspan=2 height="40" align="center" valign=middle class="mediumText">THANKS FOR YOUR BUSINESS</td>
    </tr>
  </table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
