<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Agent;
use App\Models\Mawb;
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
        $row_per_page = 25;
        $search =  $request->input('term');
        if($search!=""){
            $orders = order::join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->join('customers', 'orders.sender', '=', 'customers.id')
            ->join('receivers', 'orders.receiver', '=', 'receivers.id')
            ->select( 'orders.*','orders_detail.line','orders_detail.weight as cn','customers.name as name_sender','receivers.name as name_receivers' )
            ->latest('orders.created_at')->where(function ($query) use ($search){
                $query->where('orders.order_id', 'like', '%'.$search.'%')
                ->where('orders_detail.kho',0);
                  
            }) ->orderby('orders_detail.line','ASC')
            ->paginate($row_per_page);
            $orders->appends(['term' => $search]);
        }
        else
        {
            $orders =  order::join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->join('customers', 'orders.sender', '=', 'customers.id')
            ->join('receivers', 'orders.receiver', '=', 'receivers.id')
            ->select( 'orders.*','orders_detail.line','orders_detail.weight as cn','customers.name as name_sender','receivers.name as name_receivers' )
            ->where('orders_detail.kho',0)
            ->latest('orders.created_at')
            ->orderby('orders_detail.line','ASC')
            ->paginate($row_per_page);
        }
        $mawbs= Mawb::where('active',0)->latest()->get();     
        return view('orders.index',compact('orders','mawbs'))
            ->with('start_no', (request()->input('page', 1) - 1) * $row_per_page + 1);
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

        $table = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA ='".env("DB_DATABASE")."' AND TABLE_NAME = 'orders'");
        $agent_id = Auth::user()->agent;
        $agent_code=Agent::where('id',$agent_id)->first();
        if($agent_code)
        {
            $prefix=$agent_code->code."-";
        }
        else
        {
            $prefix="A-";
        }
        
            $subid= order::latest('id')->first();
            if(!$subid)
            {   
                $subid=1;
                $code=$prefix.str_pad( $subid,5,'0',STR_PAD_LEFT);
            }
            else
            {
                $subid=$table[0]->AUTO_INCREMENT;
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
        if(empty($request->service['1']['0']))
        {
            $data['service']=NULL;
        }
        else{
            $data['service']=$request->service['1']['0'];
        }
      
        $order = order::create( $data);
        $orderID = $order->id;
        $code=$prefix.str_pad( $orderID,5,'0',STR_PAD_LEFT);
        $order = order::where('id',$orderID)->update(array('order_id'=>$code));
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
        $order = order::join('customers', 'orders.sender', '=', 'customers.id')
        ->join('receivers', 'orders.receiver', '=', 'receivers.id')
        ->select( 'orders.*','customers.name as name_sender','receivers.name as name_receivers', 
        'customers.address as address_sender',
        'receivers.address as address_receivers',
        'customers.phone as phone_sender',
        'receivers.phone as phone_receivers'
        )
        ->where('orders.id',$id)->first();
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
        $agent_id = Auth::user()->agent;
        $agent_code=Agent::where('id',$agent_id)->first();
        if($agent_code)
        {
            $prefix=$agent_code->code."-";
        }
        else
        {
            $prefix="A-";
        }
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
        if(empty($request->service['1']['0']))
        {
            $data['service']=NULL;
        }
        else{
            $data['service']=$request->service['1']['0'];
        }
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
        orderdetail::where('order_id', $id)->delete();
        order::find($id)->delete();
      
        return redirect()->route('orders.index')
        ->with('success','Order deleted successfully'); 
    }
}
