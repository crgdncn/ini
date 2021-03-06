<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;

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
        $actionRoute = relativeRoute('ini.types.store');

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
        $actionRoute = relativeRoute('ini.types.update', $type->id);

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
     * @param  \App\Models\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type)
    {
        $count = $type->files()->count();
        if ($count > 0) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> $count files of this INI type still exist. <br>Please delete those before deleting the INI type definition.",
            ], 403);
        }

        $count = $type->iniSections()->count() ;
        if ($count > 0) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> $count sections of this file type still exist. <br>Please delete those before deleting the file definition.",
            ], 403);
        }

        $type->delete();
    }
}
