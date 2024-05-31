<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper as Help;
use App\Models\Technology;
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['toSearch'])){
            $projects = Project::where('title', 'LIKE', '%' . $_GET['toSearch'] . '%')->paginate(15);
        }else{

            $projects = Project::orderByDesc('id')->paginate(15);
        }

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = route('admin.project.store');
        $method = 'POST';
        $project = null;
        $title = 'Nuovo Progetto';
        $btn = 'Aggiungi';
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create-edit', compact('route', 'method', 'project', 'title','btn', 'types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

        $form_data = $request ->all();
        $exist = Project::where('title', $form_data['title'])->first();
        if($exist){
            return redirect()->route('admin.project.create')->with('error', 'Titolo del progetto già esistente');
        } else{
            $new_project = new Project();
            $form_data['slug'] = Help::createSlug($form_data['title'], Project::class);

            //? Riempio e salvo
            $new_project->fill($form_data);
            $new_project->save();

            if(array_key_exists('technologies', $form_data)){
                $new_project->technologies()->attach($form_data['technologies']);
            }

            //? Ridireziono
            return redirect()->route('admin.project.index')->with('success', 'Progetto aggiunto correttamente!');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $route = route('admin.project.update', $project);
        $method = 'PUT';
        $title = 'Modifica un Progetto';
        $btn = 'Modifica';
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create-edit', compact('route', 'method', 'project', 'title', 'btn', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($form_data['title'] === $project->title){
        $form_data['slug'] = $project->slug;
        }else{
            $form_data['slug'] = Help::createSlug($form_data['title'], Project::class) ;
        }

        $project->update($form_data);

        if(array_key_exists('technologies', $form_data)){
            $project->technologies()->sync($form_data['technologies']);
        }else{
            $project->technologies()->detach();
        }
        return redirect()->route('admin.project.index',$project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('deleted', 'Il progetto'. ' ' . $project->title. ' ' .'è stato cancellato con successo!');
    }
}
