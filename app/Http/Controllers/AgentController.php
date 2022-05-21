<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AgentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:agent-list|agent-create|agent-edit|agent-delete', ['only' => ['index','store','get_all']]);
         $this->middleware('permission:agent-create', ['only' => ['create','store']]);
         $this->middleware('permission:agent-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agent-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $row_per_page = 25;
        $search =  $request->input('term');
        if($search!=""){
            $agents = Agent::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                     ->where('active',0);
            })->paginate($row_per_page);
            $agents->appends(['term' => $search]);
        }
        else
        {
            $agents =  Agent::where('active',0)
            ->paginate($row_per_page);
        }
                     
        return view('agents.index',compact('agents'))
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
        return view('agents.create',compact('permission'));
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
            'phone' => 'required',
            'code' => 'required',
            'address' => 'required',
        ]);
        $data=[];
        $data['name']=$request->name;
        $data['code']=$request->code;
        $data['phone']=$request->phone;
        $data['address'] =$request->address;
         Agent::create( $data);
        return redirect()->route('agents.index')
        ->with('success','Agent created successfully.');
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
        $agents = Agent::where('id',$id)->first();
        
        return view('agents.edit',compact('agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,)
    {
        $data=[];
        $data['name']=$request->name;
        $data['code']=$request->code;
        $data['phone']=$request->phone;
        $data['address'] =$request->address;
        Agent::where('id',$id)
              ->update($data);
    
        return redirect()->route('agents.index')
                        ->with('success','Agents updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::find($id)->update(['active' => 1]);
        return redirect()->route('agents.index')
        ->with('success','Agent deleted successfully.');
    }
}
