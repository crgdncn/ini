<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniKey;
use App\Models\IniType;
use App\Models\IniSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeyController extends Controller
{
    public function all()
    {
        $all = IniType::orderBy('name', 'asc')->get();
        return view('ini.keys.all', compact('all'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * [create description]
     * @param  IniType    $type
     * @param  IniSection $section
     * @return \Illuminate\Http\Response
     */
    public function create(IniType $type, IniSection $section)
    {
        $key = new IniKey();
        $method = 'POST';
        $actionRoute = relativeRoute('ini.types.sections.keys.store', [$type, $section]);
        return view('ini.keys.partials.form', compact('key', 'section', 'type', 'actionRoute', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType $type
     * @param  \App\Models\IniSection $section
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IniType $type, IniSection $section)
    {
        $request->validate(['name' => 'required|max:32|unique_with:ini_keys,ini_section_id']);
        $key = IniKey::create($request->all());
        return view('ini.keys.partials.iniKeyTableRow', compact('key', 'section', 'type'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IniType $type
     * @param  \App\Models\IniSection $section
     * @param  \App\Models\IniKey  $key
     * @return \Illuminate\Http\Response
     */
    public function edit(IniType $type, IniSection $section, IniKey $key)
    {
        $method = 'PUT';
        $actionRoute = relativeRoute('ini.types.sections.keys.update', [$type, $section, $key]);
        return view('ini.keys.partials.form', compact('key', 'section', 'type', 'actionRoute', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType $type
     * @param  \App\Models\IniSection $section
     * @param  \App\Models\IniKey  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $type, IniSection $section, IniKey $key)
    {
        $request->validate(['name' => 'required|max:32|unique_with:ini_keys,ini_section_id,' . $key->id]);
        $key->update($request->all());
        return view('ini.keys.partials.iniKeyTableRow', compact('key', 'section', 'type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IniType $type
     * @param  \App\Models\IniSection $section
     * @param  \App\Models\IniKey  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type, IniSection $section, IniKey $key)
    {
        $count = $key->fileSectionKeys()->count();

        if ($count > 0) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> $count keys of this type still exist. <br>Please delete those before deleting the INI key definition.",
            ], 403);
        }

        $key->delete();
    }
}
