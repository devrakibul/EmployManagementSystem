@extends('master')
@section('title')
Task List
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Task List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                <li class="breadcrumb-item active">Task List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Upcoming</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
                                    <thead>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Task Name</th>
                                        <th>Task Image</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            @if ($task->status == 1)
                                                <tr>
                                                    <td style="width: 60px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="{{ $task->id }}">
                                                            <label class="custom-control-label" for="{{ $task->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0">{{ $task->user_id }}</h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0"><a href="{{ url('/task_overview', $task->id) }}"
                                                                class="text-dark">{{ $task->name }}</a></h5>
                                                    </td>
                                                    <td>
                                                        <div class="team">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="">
                                                                <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span
                                                                class="badge badge-pill badge-soft-warning font-size-11">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">In Progress</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
                                    <thead>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Task Name</th>
                                        <th>Task Image</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            @if ($task->status == 2)
                                                <tr>
                                                    <td style="width: 60px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="{{ $task->id }}">
                                                            <label class="custom-control-label" for="{{ $task->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0">{{ $task->user_id }}</h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                                class="text-dark">{{ $task->name }}</a></h5>
                                                    </td>
                                                    <td>
                                                        <div class="team">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="">
                                                                <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span
                                                                class="badge badge-pill badge-soft-warning font-size-11">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Completed</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
                                    <thead>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Task Name</th>
                                        <th>Task Image</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            @if ($task->status == 3)
                                                <tr>
                                                    <td style="width: 60px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="{{ $task->id }}">
                                                            <label class="custom-control-label" for="{{ $task->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0">{{ $task->user_id }}</h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                                class="text-dark">{{ $task->name }}</a></h5>
                                                    </td>
                                                    <td>
                                                        <div class="team">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="">
                                                                <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span
                                                                class="badge badge-pill badge-soft-warning font-size-11">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
