<?php

namespace App\Http\Controllers;

use App\Models\Infors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Infors= Infors::latest()->paginate(5);

        return view('info.index', compact('Infors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function show(Infors $infors)
    {
        //return view('info.index', compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function edit(Infors $infors,$id)
    {
        
        
        $infors = Infors::findOrFail($id);
      
        return view('info.edit', compact('infors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infors $infors,$id)
    {
        
        $infors = Infors::findOrFail($id);
        $infors->update($request->all());
       
        return redirect()->route('infor.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infors $infors)
    {
        //
    }
}
