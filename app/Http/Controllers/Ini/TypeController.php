<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iniTypes = IniType::all();
        return view('ini.index', compact('iniTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $iniType)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function edit(IniType $iniType)
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $iniType)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $iniType)
    {
        dd(__METHOD__);
    }
}
