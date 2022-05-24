<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\orderdetail;
use App\Models\Mawb;
use App\Models\order;
class MawbController extends Controller
{
    function __construct()
    {
         //check permission 
    }
    public function index(Request $request)
    {
        $mawbs= Mawb::where('active',0)->latest()->paginate(25);
        return view('mawb.index', compact('mawbs'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('mawb.create',compact('permission'));
    }
    public function cancel(Request $request,$id)
    {
        try{
            if(empty($request->item))
        {
            return response()->json([
                'data'=>$request->item,
                'error' => true
              ]);
        }
        else
        {
            $ids = $request->item;
            $arrID = explode(',', $ids);
            foreach($arrID as $key => $id )
            {
            orderdetail::where('order_id',(int)substr($id,2,7))->where('line',(int)substr($id,8))->update( array('kho'=>0));
            }
            return response()->json([
                'data'=>$id,
                'success' => true
              ]);
        }

        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
        

    }
    public function xuatkho(Request $request)
    {
        try{
            if( !isset($_COOKIE['mawb']))
        {
            return redirect()->route('home');
        }
        else
        {
            $ids = $_COOKIE['mawb'];
            $arrID = explode(',', $ids);
            foreach($arrID as $key => $id )
            {
            orderdetail::where('order_id',(int)substr($id,2,7))->where('line',(int)substr($id,8))->update( array('kho'=>$request->kho));
            }
            return redirect()->route('orders.index')
                    ->with('success',' Xuất kho thành công.');
        }

        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
        
   
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
            'name' => 'required',
            'code' => 'required|unique:mawb',
            'date_inventory' => 'required',
            'code_flight' => 'required'
           ]);
    
        // data processing
        $data=[];
        $data['name']=$request->name;
        $data['code']=$request->code;
        $data['date_inventory'] =$request->date_inventory;
        $data['code_flight']=$request->code_flight;

        $mawb = mawb::create( $data);
        return redirect()->route('mawb.index')
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
        $row_per_page = 25;
        $orders =  order::join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->join('customers', 'orders.sender', '=', 'customers.id')
            ->join('receivers', 'orders.receiver', '=', 'receivers.id')
            ->select( 'orders.*','orders_detail.line','orders_detail.weight as cn','customers.name as name_sender','receivers.name as name_receivers' )
            ->where('orders_detail.kho',$id)
            ->latest('orders.created_at')
            ->orderby('orders_detail.line','ASC')
            ->paginate($row_per_page);
            return view('mawb.show',compact('orders','id'))
            ->with('start_no', (request()->input('page', 1) - 1) * $row_per_page + 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
}
