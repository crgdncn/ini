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
        $types = IniType::get();
        return view('ini.types.index', compact('types'));
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

        $type = new IniType();
        $method = 'POST';
        $actionRoute = route('ini.types.store');

        return view('ini.types.partials.form', compact('type', 'actionRoute', 'method'));
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
            'name' => 'required|unique:ini_types,name,|max:32',
        ]);

        $type = IniType::create($request->all());
        return view('ini.types.partials.iniTypeTableRow', compact('type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $type)
    {
        $sections = $type->sections;
        return view('ini.types.show', compact('type', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType  $type
     * @return \Illuminate\Http\Response ??? Is this not just text?
     */
    public function edit(Request $request, IniType $type)
    {
        if (!$type || !$type->id) {
            abort(404);
        }

        if (!$request->ajax()) {
            abort(404);
        }

        $method = 'PUT';
        $actionRoute = route('ini.types.update', $type->id);

        return view('ini.types.partials.form', compact('type', 'actionRoute', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $type)
    {
        $request->validate([
            'name' => 'required|unique:ini_types,name,' . $type->id . '|max:32',
        ]);

        $type->update($request->all());

        return view('ini.types.partials.iniTypeTableRow', compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AppModels\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type)
    {
        $type->delete();
    }
}
