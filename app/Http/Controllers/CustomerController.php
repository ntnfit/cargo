<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        
        $option ="<option></option>";
      
        foreach($customers as $customer)
        {
          $option .='<option value="'.$customer->id.'">'.$customer->name.'-'.$customer->phone.'</option>';
        }
        return $option;
    }
    public function get_all (Request $request)
    { 
        $search =  $request->input('term');
        if($search!=""){
            $customer = Customer::where(function ($query) use ($search){
                $query->where('phone', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%');
            })
            ->paginate(25);
            $customer->appends(['term' => $search]);
        }

        else
        {
            $customer= Customer::paginate(25);

        }
        return view('customer_recever.list_customer',compact('customer'))
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
          'name' => 'required',
          'phone' => 'required|unique:customers,phone',
          'address' => 'required',
      ]);
      $input = $request->all();
      $customer = Customer::create($input);
      return response()->json([
        'data' => $customer,
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
        $customers = customer::findOrFail($id);
        return view('customer_recever.edit_customer', compact('customers'));
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
        $customers = Customer::find($id);
       
        $customers->update($request->all());
       
        return redirect()->route('listcustomer')
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
