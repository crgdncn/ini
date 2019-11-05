<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\FileSection;
use App\Models\FileSectionKey;

class KeyController extends Controller
{
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
     * Show the form for creating key values
     *
     * @param $file \App\Models\File
     * @param $section \App\Models\FileSection
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file, FileSection $section)
    {
        $key = new FileSectionKey();
        $sectionIniKeys = $section->availableIniKeys();
        $actionRoute = route('files.file.sections.keys.store', [$file, $section]);
        $method = 'POST';
        return view('files.keys.partials.form', compact('file', 'section', 'key', 'sectionIniKeys', 'actionRoute', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file, FileSection $section)
    {
        $request->validate([
            'ini_key_id' => 'required',
            'value' => 'required|max:64',
        ]);

        $key = FileSectionKey::create([
            'file_section_id' => $section->id,
            'ini_key_id' => $request->input('ini_key_id'),
            'value' => $request->input('value'),
        ]);

        return view('files.keys.partials.keyTableRow', compact('file', 'section', 'key'));
    }

    /**
     * Display the specified resource.
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
     * @param $file \App\Models\File
     * @param $section \App\Models\FileSection
     * @param $key \App\Models\FileSectionKey
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file, FileSection $section, FileSectionKey $key)
    {
        $sectionIniKeys = $section->availableIniKeys();
        $actionRoute = route('files.file.sections.keys.update', [$file, $section, $key]);
        $method = 'PUT';
        return view('files.keys.partials.form', compact('file', 'section', 'key', 'sectionIniKeys', 'actionRoute', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $file \App\Models\File
     * @param $section \App\Models\FileSection
     * @param $key \App\Models\FileSectionKey
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file, FileSection $section, FileSectionKey $key)
    {
        $request->validate([
            'value' => 'required|max:64',
        ]);

        $key->value = $request->input('value');
        $key->save();

        return view('files.keys.partials.keyTableRow', compact('file', 'section', 'key'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file, FileSection $section, FileSectionKey $key)
    {

        if ($file->id != $section->file->id) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> file section does not belong to file."
            ], 403);
        }

        if ($section->id != $key->fileSection->id) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> section key does not belong to file section."
            ], 403);
        }

        $key->delete();
    }
}
