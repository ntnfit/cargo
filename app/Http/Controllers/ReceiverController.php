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
    public function index()
    {
        
    }
    public function get_all (Request $request)
    { 
        $search =  $request->input('term');
        if($search!=""){
            $receiver = Receiver::where(function ($query) use ($search){
                $query->where('phone', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%');
            })
            ->paginate(25);
            $receiver->appends(['term' => $search]);
        }
        else
        {
            $receiver= Receiver::paginate(25);
        }
    
        return view('customer_recever.list_receiver',compact('receiver'))
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
        $receivers=Receiver::where('customer_id',$id)->get();;
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
        //
    }
}
