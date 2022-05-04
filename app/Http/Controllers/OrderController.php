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
    function __construct()
    {
         $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','store']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $orders=order::join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
    ->join('customers', 'orders.sender', '=', 'customers.id')
    ->join('receivers', 'orders.receiver', '=', 'receivers.id')
    ->select( 'orders.*','orders_detail.line','customers.name as name_sender','receivers.name as name_receivers' )
    ->latest('orders.created_at')
    ->where([
        ['orders.order_id','!=',Null],
        [function ($query) use ($request) {
            if(($term=$request->term)){
                 $query->orwhere('orders.order_id','LIKE','%'.$term.'%')->get();
            }
        }],
        ['orders_detail.status','=',0]
        ])
    ->paginate(10);
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
            'deldate' => 'required',
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
        $data['value_order']=$request->value_order;
        $data['weight']=$request->weight;
        $data['tax']=$request->tax;
        $data['discount']=$request->discount;
        $data['total']=$request->value_order+$request->tax - $request->discount;
        $data['service']=$request->service['1']['0'];
        $order = order::create( $data);
        $orderID = $order->id;
            
       // return redirect()->route('products.index')
       //                 ->with('success','Product created successfully.');
        $datadetail=[];
        $line=1;
        foreach ($request->order as $orders){
            $datadetail['order_id']=$orderID;
            $datadetail['description']=$orders['item'];
            $datadetail['weight']=$orders['weight']; 
            $datadetail['line']=$line++;
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
       
        //data processing
        $data=[];
        $prefix="A-";
        $code=$prefix.str_pad( $id,5,'0',STR_PAD_LEFT);
        $data['order_id']=$code;
        $data['shipdate']=$request->shipdate;
        $data['deldate']=$request->deldate;
        $data['sender'] =$request->sender;
        $data['receiver']=$request->receiver;
        $data['remark']=$request->remark;
        $data['value_order']=$request->value_order;
        $data['weight']=$request->weight;
        $data['tax']=$request->tax;
        $data['discount']=$request->discount;
        $data['total']=$request->value_order+$request->tax - $request->discount;
        $data['service']=$request->service['1']['0'];
        //update order
        
        $order = order::find($id);
        $order->update($data);
        $orderID = $order->id;
       // return redirect()->route('products.index')
       //                 ->with('success','Product created successfully.');
        $datadetail=[];
        $line=0;
        //handing remove recorde data detail
        $a=orderdetail::where('order_id',$orderID)->count();
        if($a > count($request->order))
        {
            $order_detail = orderdetail::where('order_id',$orderID)->delete();
           
        }
       
            foreach ($request->order as $orders=>$value){
                $datadetail['order_id']=$orderID;
                $datadetail['description']=$value['item'];
                $datadetail['weight']=$value['weight']; 
                $datadetail['line']= ++$line;
                $order_detail = orderdetail::where('order_id',$orderID)->where('line',$line);
                if ($order_detail->count() != 0) {
                    $order_detail->update($datadetail);
                } else {
                    $order_detail =orderdetail::updateOrCreate($datadetail);
                }
            }
        
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
