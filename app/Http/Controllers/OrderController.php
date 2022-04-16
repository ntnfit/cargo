<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=order::join('customers', 'orders.sender', '=', 'customers.id')
    ->join('receivers', 'orders.receiver', '=', 'receivers.id')
    ->select( 'orders.*','customers.name as name_sender','receivers.name as name_receivers' )
    ->latest('orders.created_at')->paginate(10);
        return view('orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('orders.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $this->validate($request, [
            'weight' => 'required',
            'receiver' => 'required',
            'sender' => 'required',
            'package' => 'required',
            'deldate' => 'required',
            'order'=>'required'
           
        ]);
    
        // 
        $prefix="A-";
            $subid= order::latest('id')->first();
            if(!$subid)
            {   
                $subid=1;
                $code=$prefix.str_pad( $subid,5,'0',STR_PAD_LEFT);
            }
            else
            {
                $subid=$subid->id+1;
                $code=$prefix.str_pad( $subid,5,'0',STR_PAD_LEFT);
            }
          
        //data processing
        $data=[];
        $data['order_id']=$code;
        $data['shipdate']=$request->shipdate;
        $data['deldate']=$request->deldate;
        $data['sender'] =$request->sender;
        $data['receiver']=$request->receiver;
        $data['remark']=$request->remark;
        $data['package']=$request->package;
        $data['weight']=$request->weight;
        $data['tax']=$request->tax;
        $data['discount']=$request->discount;
        $data['total']=$request->tax + $request->discount;
        $order = order::create( $data);
        $orderID = $order->id;
            
       // return redirect()->route('products.index')
       //                 ->with('success','Product created successfully.');
        $datadetail=[];
        foreach ($request->order as $orders){
            $datadetail['order_id']=$orderID;
            $datadetail['description']=$orders['item'];
            $datadetail['weight']=$orders['weight']; 
            orderdetail::create($datadetail);
        }
       
        return redirect()->route('orders.index')
        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = order::find($id);
        $order_detail = orderdetail::where('order_id',$id)->get();
        return view('orders.edit',compact('order','order_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = order::find($id);
        $input = $request->all();
        $order->update($input);
        return redirect()->route('orders.index')
                        ->with('success','orders updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
