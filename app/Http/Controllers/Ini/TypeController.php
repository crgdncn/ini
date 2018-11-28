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
        $iniTypes = IniType::get();
        return view('ini.types.index', compact('iniTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $iniType = new IniType();
        $editing = false;
        $actionRoute = route('ini.types.create');

        return view('ini.types.partials.form', compact('iniType', 'actionRoute', 'editing'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:ini_types|max:32',
            'description' => 'required',
        ]);

        $iniType = IniType::create($request->all());
        return redirect(route('ini.types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $type)
    {
        //dd($type);
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType  $iniType
     * @return \Illuminate\Http\Response ??? Is this not just text?
     */
    public function edit(Request $request, IniType $type)
    {

        $iniType = $type;

        if (!$iniType || !$iniType->id) {
            abort(404);
        }

        if (!$request->ajax()) {
            abort(404);
        }

        $editing = true;
        $actionRoute = route('ini.types.edit', $iniType->id);

        return view('ini.types.partials.form', compact('iniType', 'actionRoute', 'editing'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $type)
    {
        $request->validate([
            'name' => 'required|unique:ini_types|max:32',
            'description' => 'required',
        ]);

        $type->update($request->all());

        return redirect(route('ini.types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AppModels\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type)
    {
        dd(__METHOD__);
    }
}
