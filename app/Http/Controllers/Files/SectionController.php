<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\FileSection;

class SectionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        $sections = $file->availableSections();
        $actionRoute = route('files.file.sections.store', $file);
        $method = 'POST';
        return view('files.sections.partials.form', compact('file', 'sections', 'actionRoute', 'method'));
    }

    /**
     * Save to file_sections
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file)
    {
        $sections = [];
        $iniSectionIds = $request->input('sections', []);

        foreach ($iniSectionIds as $iniSectionId) {
            $sections[] = FileSection::create([
                'file_id' => $file->id,
                'ini_section_id' => $iniSectionId
            ]);
        }

        return view('files.sections.partials.tableRows', compact('file', 'sections'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file, FileSection $section)
    {
        return view('files.sections.show', compact('file', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModelsFile $file
     * @param \App\Models\FileSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file, FileSection $section)
    {
        if ($file->id != $section->file->id) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> file section does not belong to file."
            ], 403);
        }

        $count = $section->fileSectionKeys()->count();

        if ($count > 0) {
            return response()->json([
                'error' => "<strong>Delete failed:</strong> $count keys of this section still exist. <br>Please delete those before deleting the file section.",
            ], 403);
        }
        $section->delete();
    }
}
