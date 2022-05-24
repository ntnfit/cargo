<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;
class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:receiver-list|receiver-create|receiver-edit|receiver-delete', ['only' => ['index','store','get_all']]);
         $this->middleware('permission:receiver-create', ['only' => ['create','store']]);
         $this->middleware('permission:receiver-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:receiver-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
    }
    public function get_all (Request $request)
    { 
        $search =  $request->input('term');
        if($search!=""){
            $receivers = Receiver::where(function ($query) use ($search){
                $query->where('phone', 'like', '%'.$search.'%')
                    ->where('active',0)
                    ->orWhere('name', 'like', '%'.$search.'%');
            })
            ->paginate(25);
            $receivers->appends(['term' => $search]);
        }
        else
        {
            $receivers= Receiver::where('active',0)->paginate(25);
        }
    
        return view('customer_recever.list_receiver',compact('receivers'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:receivers,phone',
            'address' => 'required',
        ]);
        
        $receiver = new Receiver;
 
        $receiver->customer_id = $request->customer_id;
        $receiver->name = $request->name;
        $receiver->phone = $request->phone;
        $receiver->address = $request->address;
        $receiver->save();
        return response()->json([
          'data' => $receiver,
          'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receivers=Receiver::where('customer_id',$id)->where('active',0)->get();;
        $option ="'<option></option>";
        foreach($receivers as $receiver)
        {
            $option .='<option value="'.$receiver->id.'">'.$receiver->name.'-'.$receiver->phone.'</option>';
        }
        return $option;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receivers = receiver::findOrFail($id);
        return view('customer_recever.edit_receiver', compact('receivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $receiver = receiver::findOrFail($id);
        $receiver->update($request->all());
       
        return redirect()->route('listreceiver')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Receiver::find($id)->update(['active' => 1]);
        return redirect()->route('listreceiver')
        ->with('success','receiver deleted successfully.');
    }
}
