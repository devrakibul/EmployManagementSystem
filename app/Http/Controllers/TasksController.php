<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $tasks = Tasks::where('user_id', $user_id)->get();
        return view('task_list', [
            'tasks' => $tasks,
            'user_id' => $user_id
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tasksList()
    {
        $tasks = Tasks::all();
        return view('tasks_list', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        $user_id = Auth::id();
        $tasks = Tasks::where('user_id', $user_id)->get();
        return view('task_kanban', [
            'tasks' => $tasks,
            'user_id' => $user_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Overview($id)
    {
        $task = Tasks::findOrfail($id);
        return view('task_overview', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_create', [
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
        $validated = $request->validate([
            'name' => 'required|unique:Tasks|max:100',
            'description' => 'required',
            'date' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = Str::random(5).'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/tasks/'. $ext));

            Tasks::insert([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect('task_list')->with('task_insert', 'Task Insert Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task_edit = Tasks::findOrfail($id);
        return view('task_edit', [
            'task_edit' => $task_edit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Update = Tasks::findOrfail($request->id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $ext = $request->name.'.'. $image->getClientOriginalExtension();

            $old_img = public_path('images/tasks/'.$Update->image);
            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Image::make($image)->save(public_path('images/tasks/'. $ext));

            $Update->name = $request->name;
            $Update->description = $request->description;
            $Update->date = $request->date;
            $Update->image = $ext;
            $Update->save();
        } else {
            $Update->name = $request->name;
            $Update->description = $request->description;
            $Update->date = $request->date;
            $Update->save();
        }

        return redirect('task_kanban')->with('task_edit', 'Task Update Successfully');
    }

    /**
     * Accept the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        $update = Tasks::findOrfail($request->id);
        $update->status = 2;
        $update->save();

        return redirect('task_kanban')->with('TaskAccept', 'Task Accept Successfully');
    }

    /**
     * Complete the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        $update = Tasks::findOrfail($request->id);
        $update->status = 3;
        $update->save();

        return redirect('task_kanban')->with('TaskAccept', 'Task Accept Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function trash(Tasks $tasks)
    {
        //
    }

    /**
     * Show the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function trashList(Tasks $tasks)
    {
        $task = Tasks::all();
        return view('task_trash_list', [
            'task' => $task
        ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function Restore(Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
