<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::Paginate(10);
        return view('admin.home', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $statuses = Status::all();
        return view('admin.create', compact('types', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => ['required', 'min:3', 'unique:projects'],
                'type_id' => ['required'],
                'status_id' => ['required'],
                'start_date' => ['required', 'date_format:Y-m-d'],
                'end_date' => ['required', 'date_format:Y-m-d'],
                'image' => ['required', 'image']
            ],
        );
        if ($request->hasFile('image')) {
            $img_path = Storage::put('uploads', $request['image']);
            $data['image'] = $img_path;
        }
        $project = Project::create($data);


        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $statuses = Status::all();
        return view('admin.edit', compact('project', 'types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate(
            [
                'title' => ['required', 'min:3',  Rule::unique('projects')->ignore($project->id),],
                'type_id' => ['required'],
                'status_id' => ['required'],
                'start_date' => ['required', 'date_format:Y-m-d'],
                'end_date' => ['required', 'date_format:Y-m-d'],
                'image' => ['required', 'image']
            ],
        );
        if ($request->hasFile('image')) {
            $img_path = Storage::put('uploads', $request['image']);
            $data['image'] = $img_path;
        }
        $project->update($data);


        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.dashboard');
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.trashed', compact('projects'));
    }

    public function restore(string $id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('admin.dashboard');
    }

    public function forceDelete(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        Storage::delete($project->image);
        $project->forceDelete();
        return redirect()->route('admin.dashboard');
    }
}
