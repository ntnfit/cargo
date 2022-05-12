<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\Receiver;
class LabelController extends Controller
{
    public function label()
    {
        if( !isset($_COOKIE['label']))
        {
            return redirect()->route('home');
        }
        else
        {
            $ids = $_COOKIE['label'];
            $arrID = explode(',', $ids);
            $label = "";
            foreach($arrID as $key => $id )
            {
                $orders=order::join('receivers', 'orders.receiver', '=', 'receivers.id')
                ->select( 'orders.*','receivers.name as name_receivers', 
                'receivers.address as address_receivers',
                'receivers.phone as phone_receivers'
                )
                ->where('orders.id',(int)substr($id,2,7))->first();
                $order_detail=orderdetail::where('order_id',(int)substr($id,2,7))->where('line',(int)substr($id,8))->first();
                $num=orderdetail::where('order_id',(int)substr($id,2,7))->count();
                $label .='
                <div class="label">
                <br>'.$num.' Box(es)
                <br> <b style="font-size:60px">'.$orders->order_id.'-'. $order_detail->line.'</b> 
                <br> <p> Người Nhận </p>
                <br> <p>Tên: '.$orders->name_receivers.'</p>
                <br> <p>Địa Chỉ: '.$orders->name_receivers.'</p>
                <br> <p> Số Điện Thoại: '.$orders->phone_receivers.'</p>
                <br> <p>Cân Nặng: '.$order_detail->weight.'</p>
                <br> <p>Hàng Hóa: '.$order_detail->description.'</p>
                <br>
              </div>
              <div class="page-break"></div>
              ';
            }
            return view('label',compact('label'));
           // return $label;
       
    }
}
}