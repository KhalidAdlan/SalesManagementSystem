<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Requests\MassDestroySectionRequest;
use App\Section;


class SectionsController extends Controller
{
    public function index(){
        abort_unless(\Gate::allows('section_access'), 403);

        $sections = Section::all();

        return view('admin.sections.index', compact('sections'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('section_create'), 403);
        $sections = Section::all();

        return view('admin.sections.create', compact('sections'));
    }
    public function store(StoreSectionRequest $request)
    {
        abort_unless(\Gate::allows('section_create'), 403);

        $section = Section::create($request->all());

        return redirect()->route('admin.sections.index');
    }
    public function edit(section $section)
    {
        abort_unless(\Gate::allows('section_edit'), 403);

        return view('admin.sections.edit', compact('section'));
    }
    public function update(UpdatesectionRequest $request, Section $section)
    {
        abort_unless(\Gate::allows('section_edit'), 403);

        $section->update($request->all());

        return redirect()->route('admin.sections.index');
    }
    public function show(Section $section)
    {
        abort_unless(\Gate::allows('section_show'), 403);

        return view('admin.sections.show', compact('section'));
    }
    public function destroy(Section $section)
    {
        abort_unless(\Gate::allows('section_delete'), 403);

        $section->delete();

        return back();
    }
}
