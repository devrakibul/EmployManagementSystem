<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/attendance', [DashboardController::class, 'Attendance'])->name('attendance');
// UserRoute
Route::get('/user_list', [MasterController::class, 'UserList'])->name('user_list');
Route::get('/user_view/{id}', [MasterController::class, 'UserView'])->name('user_view');
Route::get('/make_admin/{id}', [MasterController::class, 'MakeAdmin'])->name('make_admin');
Route::get('/make_membern/{id}', [MasterController::class, 'MakeMember'])->name('make_member');
Route::get('/user_delete/{id}', [MasterController::class, 'UserDelete'])->name('user_delete');
Route::get('/attendList', [MasterController::class, 'AttendList'])->name('attendList');

// ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/employee_profile', [ProfileController::class, 'Show'])->name('employee_profile');
    Route::get('/profile_edit/{id}', [ProfileController::class, 'ProfileEdit'])->name('profile_edit');
    Route::post('/profile_update', [ProfileController::class, 'ProfileUpdate'])->name('profile_update');
    Route::get('/other_profile_edit/{id}', [ProfileController::class, 'OtherProfileEdit'])->name('other_profile_edit');
    Route::post('/other_profile_update', [ProfileController::class, 'OtherProfileUpdate'])->name('other_profile_update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit1');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit2');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile.partials.delete-user-form', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ProjectController
Route::get('/project_grid', [ProjectController::class, 'index'])->name('project_grid');
Route::get('/project_list', [ProjectController::class, 'show'])->name('project_list');
Route::get('/projects_list', [ProjectController::class, 'projectsList'])->name('projects_list');
Route::get('/project_create', [ProjectController::class, 'create'])->name('project_create');
Route::post('/project_post', [ProjectController::class, 'store'])->name('project_post');
Route::get('/project_edit/{id}', [ProjectController::class, 'edit'])->name('project_edit');
Route::post('/project_update', [ProjectController::class, 'update'])->name('project_update');
Route::get('/projects_overview/{id}', [ProjectController::class, 'Overview'])->name('projects_overview');
Route::get('/project_trash/{id}', [ProjectController::class, 'trash'])->name('project_trash');
Route::get('/project_trash_list', [ProjectController::class, 'trashList'])->name('project_trash_list');
Route::get('/project_restore/{id}', [ProjectController::class, 'Restore'])->name('project_restore');
Route::get('/project_delete/{id}', [ProjectController::class, 'destroy'])->name('project_delete');
// TaskController
Route::get('/task_list', [TasksController::class, 'index'])->name('task_list');
Route::get('/tasks_list', [TasksController::class, 'tasksList'])->name('tasks_list');
Route::get('/task_kanban', [TasksController::class, 'show'])->name('task_kanban');
Route::get('/task_create', [TasksController::class, 'create'])->name('task_create');
Route::post('/task_post', [TasksController::class, 'store'])->name('task_post');
Route::get('/task_edit/{id}', [TasksController::class, 'edit'])->name('task_edit');
Route::post('/task_update', [TasksController::class, 'update'])->name('task_update');
Route::get('/task_overview/{id}', [TasksController::class, 'Overview'])->name('task_overview');
Route::get('/task_trash/{id}', [TasksController::class, 'trash'])->name('task_trash');
Route::get('/task_accept/{id}', [TasksController::class, 'accept'])->name('task_accept');
Route::get('/task_complete/{id}', [TasksController::class, 'complete'])->name('task_complete');
Route::get('/task_trash_list', [TasksController::class, 'trashList'])->name('task_trash_list');
Route::get('/task_restore/{id}', [TasksController::class, 'Restore'])->name('task_restore');
Route::get('/task_delete/{id}', [TasksController::class, 'destroy'])->name('task_delete');

require __DIR__.'/auth.php';
