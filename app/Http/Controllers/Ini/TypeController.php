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
        $iniType = new IniType();

        if ($request->ajax()) {
            $render = view('ini.types.create', compact('iniType'))->render();
            return e($render);
        } else {
            // abort(404);
            return view('ini.types.create', compact('iniType'));
        }
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
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function show(IniType $type)
    {
        dd($type);
        //abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function edit(IniType $type)
    {

        $iniType = $type;

        if (!$iniType->id) {
            //abort(404);
        }

        return view('ini.types.edit', compact('iniType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IniType  $iniType
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
     * @param  \App\IniType  $iniType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IniType $type)
    {
        dd(__METHOD__);
    }
}
