<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\Infors;
class InvoiceController extends Controller
{
    public function print($id)
    {
        
        $infors= Infors::latest()->first();
       
        $orders=order::join('customers', 'orders.sender', '=', 'customers.id')
        ->join('receivers', 'orders.receiver', '=', 'receivers.id')
        ->select( 'orders.*','customers.name as name_sender','receivers.name as name_receivers', 
        'customers.address as address_sender',
        'receivers.address as address_receivers',
        'customers.phone as phone_sender',
        'receivers.phone as phone_receivers'
        )
        ->where('orders.id',$id)->first();
        $order_detail=orderdetail::where('order_id',$id)->get();

        return view('invoice',compact('orders','infors','order_detail'));
    }
}
