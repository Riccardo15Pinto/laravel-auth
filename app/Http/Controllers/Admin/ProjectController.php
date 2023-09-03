<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_new_project = $request->all();

        $request->validate(
            [
                'name_project' => 'required|string|max:50',
                'url_project' => 'required|string|url',
                'description_project' => 'required|string',
                'type_project' => 'required|string',
            ],
            [
                'name_project.required' => 'Il titolo è obbligatorio',
                'url_project.required' => 'L\'url è obbligatorio',
                'description_project.required' => 'La descrizione è obbligatoria',
                'type_project.required' => 'La tipologia di progetto è obbligatoria',
                'url_project.url' => 'L\'url deve contenere http , https',
            ]
        );

        $project = new Project();
        $project->fill($data_new_project);
        $project->slug = Str::slug($data_new_project['name_project'], '-');
        $project->save();

        return to_route('admin.projects.show', $project)->with('alert-type', 'success')->with('alert-message', "$project->name_project creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data_new_project = $request->all();

        $request->validate(
            [
                'name_project' => 'required|string|max:50',
                'url_project' => 'required|string|url',
                'description_project' => 'required|string',
                'type_project' => 'required|string',
            ],
            [
                'name_project.required' => 'Il titolo è obbligatorio',
                'url_project.required' => 'L\'url è obbligatorio',
                'description_project.required' => 'La descrizione è obbligatoria',
                'type_project.required' => 'La tipologia di progetto è obbligatoria',
                'url_project.url' => 'L\'url deve contenere http , https',
            ]
        );


        $project->update($data_new_project);

        return to_route('admin.projects.show', $project)->with('alert-type', 'success')->with('alert-message', "$project->name_project modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$project->name_project eliminato con successo")
            ->with('toast-route', route('admin.projects.trash.restore', $project->id))
            ->with('toast-messagge', 'Vuoi ripristinare il progetto?')
            ->with('toast-method', 'patch');
    }

    public function trash()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.project.trash', compact('projects'));
    }

    public function restore(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);

        $project->restore();
        return to_route('admin.projects.trash')
            ->with('alert-type', 'success')
            ->with('alert-message', "$project->name_project è stato ripristinato con successo");
    }


    public function restoreAll()
    {
        Project::onlyTrashed()->restore();
        return to_route('admin.projects.trash')
            ->with('alert-type', 'success')
            ->with('alert-message', "Hai ripristinato con successo tutti gli studenti");
    }

    public function drop(string $id)
    {

        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return to_route('admin.projects.index')->with('alert-type', 'success')
            ->with('alert-message', "$project->name_project eliminato definitivamente");
    }
}
