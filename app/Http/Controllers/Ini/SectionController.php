<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniType;
use App\Models\IniSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function all()
    {
        $all = IniType::orderBy('name', 'asc')->with('sections')->get();
        return view('ini.sections.all', compact('all'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function index(IniType $iniType)
    {
        $iniSections = $iniType->sections;
        return view('ini.sections.index', compact('iniType', 'iniSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function create(IniType $iniType)
    {
        return view('ini.sections.form', compact('iniType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function store(IniType $iniType, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IniSection  $iniSection
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IniSection  $iniSection
     * @return \Illuminate\Http\Response
     */
    public function edit(IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IniSection  $iniSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $iniType, IniSection $iniSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IniSection  $iniSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $iniType, IniSection $iniSection)
    {
        //
    }
}
