<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store','get_all']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $customers=Customer::where('active',0)->get();
        
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
            $customers = Customer::where(function ($query) use ($search){
                $query->where('phone', 'like', '%'.$search.'%')
                        ->where('active',0)
                    ->orWhere('name', 'like', '%'.$search.'%');
            })
            ->paginate(25);
            $customers->appends(['term' => $search]);
        }

        else
        {
            $customers= Customer::where('active',0)->paginate(25);

        }
        return view('customer_recever.list_customer',compact('customers'))
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
        Customer::find($id)->update(['active' => 1]);
        return redirect()->route('listcustomer')
        ->with('success','customer deleted successfully.');
    }
}
