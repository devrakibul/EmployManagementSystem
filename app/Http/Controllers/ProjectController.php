<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFiles;
use App\Models\ProjectImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use App\Models\ProjectMembers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        return view('project_grid', [
            'project' => $project
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $request)
    {
        $projects = Project::all();
        return view('project_list', [
            'projects' => $projects
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectsList(Project $request)
    {
        $user_id = Auth::id();
        $projects = Project::where('id', $user_id)->get();
        return view('projects_list', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Overview($id)
    {
        $project = Project::
        join('project_members','projects.id','project_members.project_id')
        ->join('users','users.id','project_members.member_id')
        ->select('projects.*',"users.name","users.image")
        ->where('projects.id',$id)->get();
        return view('projects_overview', [
            'projects' => $project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('project_create', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_id = Project::insertGetId([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at' => Carbon::now()
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            foreach ($image as $img) {
                $img_ext = Str::random(5).'.'. $img->getClientOriginalExtension();
                image::make($img)->save('images/project_image/' . $img_ext);
                ProjectImages::insert([
                    'project_id' => $project_id,
                    'image' => $img_ext,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $file_ext = Str::random(5).'.'. $file->getClientOriginalExtension();
                $file->move(public_path('\files'),$file_ext);
                ProjectFiles::insert([
                    'project_id' => $project_id,
                    'file' => $file_ext,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        foreach ($request->member_id as $value) {
            $data = new ProjectMembers;
            $data->member_id = $value;
            $data->project_id = $project_id;
            $data->save();
        }
        return redirect('project_list')->with('project_create', 'Project Create Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $project = Project::findOrfail($id);
        $projectImages = ProjectImages::where('project_id', $project->id)->get();
        $projectFiles = ProjectFiles::where('project_id', $project->id)->get();
        $projectMembers = ProjectMembers::where('project_id', $project->id)->get();
        return view('/project_edit', [
            'project' => $project,
            'users' => $users,
            'projectImages' => $projectImages,
            'projectFiles' => $projectFiles,
            'projectMembers' => $projectMembers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = Project::findOrfail($request->id);
        $update->name = $request->name;
        $update->type = $request->type;
        $update->description = $request->description;
        $update->start_date = $request->start_date;
        $update->end_date = $request->end_date;
        $update->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            foreach ($image as $img) {
                $imgUpdate = ProjectImages::findOrfail($request->id);
                $img_ext = Str::random(5).'.'. $img->getClientOriginalExtension();
                $old_img = public_path('images/project_image/'.$imgUpdate['image']);
                if (file_exists($old_img)) {
                    unlink($old_img);
                }
                image::make($img)->save('images/project_image/' . $img_ext);
                $imgUpdate->project_id = $update['id'];
                $imgUpdate->image = $request->img_ext;
                $imgUpdate->save();
            }
        }
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $file_ext = Str::random(5).'.'. $file->getClientOriginalExtension();
                $file->move(public_path('\files'),$file_ext);
                ProjectFiles::insert([
                    'project_id' => $update->id,
                    'file' => $file_ext,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        foreach ($request->member_id as $value) {
            $data = new ProjectMembers;
            $data->member_id = $value;
            $data->project_id = $update->id;
            $data->save();
        }
        return redirect('project_list')->with('project_create', 'Project Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function trash(Project $project)
    {
        //
    }

    /**
     * Show the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function trashList(Project $project)
    {
        $project = Project::all();
        return view('project_trash_list', [
            'project' => $project
        ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function Restore(Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
