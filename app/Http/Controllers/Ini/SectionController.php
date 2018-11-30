<?php

namespace App\Http\Controllers\Ini;

use App\Models\IniType;
use App\Models\IniSection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
     * @param  \App\Modals\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function index(IniType $type)
    {
        $sections = $type->sections;
        return view('ini.sections.index', compact('type', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modals\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, IniType $type)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $section = new IniSection();
        $method = 'POST';
        $actionRoute = route('ini.types.sections.store', $type);

        return view('ini.sections.partials.form', compact('type', 'section', 'actionRoute', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modals\IniType  $type
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IniType $type)
    {
        $request->validate(['name' => 'required|max:32|unique_with:ini_sections,ini_type_id']);
        $section = IniSection::create($request->all());
        return view('ini.sections.partials.iniSectionTableRow', compact('type', 'section'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modals\IniSection  $section
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $type, IniSection $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IniType  $type
     * @param  \App\Models\IniSection  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, IniType $type, IniSection $section)
    {
        if (!$section || !$section->id) {
            abort(404);
        }

        if (!$request->ajax()) {
            abort(404);
        }

        $method = 'PUT';
        $actionRoute = route('ini.types.sections.update', [$type, $section]);

        return view('ini.sections.partials.form', compact('type', 'section', 'actionRoute', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IniSection  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IniType $type, IniSection $section)
    {
        $request->validate(['name' => 'required|max:32|unique_with:ini_sections,ini_type_id,' . $section->id]);
        $section->update($request->all());

        return view('ini.sections.partials.iniSectionTableRow', compact('type', 'section'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IniSection  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type, IniSection $section)
    {
        \Log::info($type->name . ' / ' . $section->name);
        $section->delete();
    }
}
