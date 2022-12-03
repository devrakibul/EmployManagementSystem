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
use Illuminate\Http\UploadedFile;

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
        // Validation
        $validated = $request->validate([
            'name' => 'required|unique:Projects|max:100',
            'type' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
            'file' => 'required',
            'member_id' => 'required',
        ]);
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
        // Validation
        $validated = $request->validate([
            'name' => 'required|unique:Projects|max:100',
            'type' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
            'file' => 'required',
            'member_id' => 'required',
        ]);
        // image update
        $image = $request->file('image');
        $imageIds = $request->input('image_id');
        if($image){
            foreach ($image as $index=>$img) {
                $hasImage = true;
                isset($imageIds[$index]) ? $imgUpdate = ProjectImages::findOrfail($imageIds[$index]) : $hasImage = false;
                if ($hasImage) {
                    $img_ext = Str::random(5).'.'. $img->getClientOriginalExtension();
                    $old_img = public_path('images/project_image/'.$imgUpdate['image']);
                    if (file_exists($old_img)) {
                        unlink($old_img);
                    }
                    image::make($img)->save('images/project_image/' . $img_ext);

                    $imgUpdate->image = $img_ext;
                    $imgUpdate->save();
                }else {
                    $img_ext = Str::random(5).'.'. $img->getClientOriginalExtension();
                    image::make($img)->save('images/project_image/' . $img_ext);
                    ProjectImages::insert([
                        'project_id' => $request->id,
                        'image' => $img_ext,
                        'created_at' => Carbon::now()
                    ]);
                }
            }
        }
        // File Update
        $files = $request->file('file');
        $fileIds = $request->input('file_id');
        if($files){
            foreach ($files as $index=>$file) {
                $hasfile = true;
                isset($fileIds[$index]) ? $fileUpdate = ProjectFiles::findOrfail($fileIds[$index]) : $hasfile = false;
                if ($hasfile) {
                    $file_ext = Str::random(5).'.'. $file->getClientOriginalExtension();
                    $old_file = public_path('\files'.$fileUpdate['file']);
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                    $file->move(public_path('\files'),$file_ext);

                    $fileUpdate->file = $file_ext;
                    $fileUpdate->save();
                }else {
                    $file_ext = Str::random(5).'.'. $file->getClientOriginalExtension();
                    $file->move(public_path('\files'),$file_ext);
                    ProjectFiles::insert([
                        'project_id' => $request->id,
                        'file' => $file_ext,
                        'created_at' => Carbon::now()
                    ]);
                }
            }
        }
        // Member Update
        $memberId = $request->member_id;
        $memberIds = $request->input('pMember_id');
        if($memberId){
            foreach ($memberId as $index=>$member) {
                $hasMember = true;
                isset($memberIds[$index]) ? $memberUpdate = ProjectMembers::findOrfail($memberIds[$index]) : $hasMember = false;
                if ($hasMember) {
                    $memberUpdate->member_id = $member;
                    $memberUpdate->save();
                }else {
                    ProjectMembers::insert([
                        'project_id' => $request->id,
                        'member_id' => $member,
                        'created_at' => Carbon::now()
                    ]);
                }
            }
        }

        $update = Project::findOrfail($request->id);
        $update->name = $request->name;
        $update->type = $request->type;
        $update->description = $request->description;
        $update->start_date = $request->start_date;
        $update->end_date = $request->end_date;
        $update->save();

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
