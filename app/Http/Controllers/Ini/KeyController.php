<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType $iniType
     * @param  \App\Models\IniSection $iniSection
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IniType $iniType
     * @param  \App\Models\IniSection $iniSection
     * @param  \App\Models\IniKey  $iniKey
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $iniType, IniSection $iniSection, IniKey $iniKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IniType $iniType
     * @param  \App\Models\IniSection $iniSection
     * @param  \App\Models\IniKey  $iniKey
     * @return \Illuminate\Http\Response
     */
    public function edit(IniType $iniType, IniSection $iniSection, IniKey $iniKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType $iniType
     * @param  \App\Models\IniSection $iniSection
     * @param  \App\Models\IniKey  $iniKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $iniType, IniSection $iniSection, IniKey $iniKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IniType $iniType
     * @param  \App\Models\IniSection $iniSection
     * @param  \App\Models\IniKey  $iniKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $iniType, IniSection $iniSection, IniKey $iniKey)
    {
        //
    }
}
