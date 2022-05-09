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
        
        $Receiver = new Receiver;
 
        $Receiver->customer_id = $request->customer_id;
        $Receiver->name = $request->name;
        $Receiver->phone = $request->phone;
        $Receiver->address = $request->address;
        $Receiver->save();
       return response()->json(['success' => true]);
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
        //
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
        //
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
