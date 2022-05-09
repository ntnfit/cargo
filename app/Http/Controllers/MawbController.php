<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Mawb;
class MawbController extends Controller
{
    function __construct()
    {
         //check permission 
    }
    public function index(Request $request)
    {
        $mawb= Mawb::latest()->paginate(15);

        return view('mawb.index', compact('mawb'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'route',
        // 'master',
        // 'destination',
        // 'value',
        // 'note',
        // 'shipdate',
        // 'no',
        // 'airline',
        // 'flight_no',
        // 'flight_departure_date',
        // 'flight_from_city',
        // 'connect_flight_no',
        // 'connect_flight_departure_date',
        // 'connect_light_departure_from',
        // 'airport',
        // 'destination_city',
        // 'destination_country',
        // $this->validate($request, [
        //     'weight' => 'required',
        //     'receiver' => 'required',
        //     'sender' => 'required',
        //     'package' => 'required',
        //     'deldate' => 'required',
        //     'order'=>'required'
           
        // ]);
    
        // // 
        // $prefix="A-";
        //     $subid= order::latest('id')->first();
        //     if(!$subid)
        //     {   
        //         $subid=1;
        //         $code=$prefix.str_pad( $subid,5,'0',STR_PAD_LEFT);
        //     }
        //     else
        //     {
        //         $subid=$subid->id+1;
        //         $code=$prefix.str_pad( $subid,5,'0',STR_PAD_LEFT);
        //     }
          
        // //data processing
        // $data=[];
        // $data['order_id']=$code;
        // $data['shipdate']=$request->shipdate;
        // $data['deldate']=$request->deldate;
        // $data['sender'] =$request->sender;
        // $data['receiver']=$request->receiver;
        // $data['remark']=$request->remark;
        // $data['value_order']=$request->value_order;
        // $data['weight']=$request->weight;
        // $data['tax']=$request->tax;
        // $data['discount']=$request->discount;
        // $data['total']=$request->value_order+$request->tax - $request->discount;
        // $order = order::create( $data);
        // return redirect()->route('orders.index')
        // ->with('success','Product created successfully.');
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
        //
    }
    
}
