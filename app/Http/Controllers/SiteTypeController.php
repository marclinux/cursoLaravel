<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site_type;

class SiteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Site_type::all();
        return view('site_type.index')
                    ->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'active' => 'required',
        ]);
        $tipo = new Site_type();
        $tipo->name = $request->input('name');
        $tipo->active = $request->input('active') ? 1 : 0;
        $tipo->save();
        return redirect(route('site_type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = Site_type::find($id);
        return view('site_type.view')->with(['tipo' => $tipo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Site_type::find($id);
        return view('site_type.edit')->with(['tipo' => $tipo]);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'active' => 'required',
        ]);
        $tipo = Site_type::find($id);
        $tipo->name = $request->input('name');
        $tipo->active = $request->input('active') ? 1 : 0;
        $tipo->save();
        return redirect(route('site_type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Site_type::find($id);
        $tipo->delete($id);
        return redirect(route('site_type.index'));
    }
}
