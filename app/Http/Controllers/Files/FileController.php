<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\FileSection;
use App\Models\FileSectionKey;
use App\Models\IniType;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('files.file.index', compact('files'));
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

        $file = new File();
        $types = IniType::all();
        $method = 'POST';
        $actionRoute = route('files.files.store');
        $selected = null;

        return view('files.file.partials.form', compact('file', 'types', 'selected', 'actionRoute', 'method'));
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
            'file_name' => 'required|unique:files,file_name|max:32',
            'ini_type_id' => 'required',
        ]);

        $file = File::create($request->all());
        return view('files.file.partials.fileTableRow', compact('file'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $type = $file->type;
        $sections = $file->sections;
        return view('files.file.show', compact('file', 'type', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, File $file)
    {
        if (!$file || !$file->id) {
            abort(404);
        }

        if (!$request->ajax()) {
            abort(404);
        }

        $method = 'PUT';
        $actionRoute = route('files.files.update', $file);
        $types = IniType::all();
        $selected = $file->ini_type_id;

        return view('files.file.partials.form', compact('file', 'types', 'selected', 'actionRoute', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'file_name' => 'required|max:32|unique:files,file_name,' . $file->id,
            'ini_type_id' => 'required',
        ]);

        $file->update($request->all());
        return view('files.file.partials.fileTableRow', compact('file'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
    }
}
