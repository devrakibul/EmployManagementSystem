@extends('master')
@section('title')
Task Kanban
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
                        <h4 class="mb-0 font-size-18">Kanban Board</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                <li class="breadcrumb-item active">Kanban Board</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Pending</h4>
                            <div id="inprogress-task" class="pb-1 task-list">
                                @foreach ($tasks as $task)
                                    @if ($task->status == 1)
                                        <div class="card task-box">
                                            <div class="card-body">
                                                <div class="float-right ml-2">
                                                    <div class="dropdown float-right">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ url('/task_accept', $task->id) }}">Accept</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url('/task_edit', $task->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="">Delete</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->
                                                </div>
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">{{ $task->name }}</a></h5>
                                                    <p class="text-muted">{{ $task->date }}</p>
                                                </div>

                                                <ul class="pl-3 mb-4 text-muted">
                                                    <li class="py-1">{!! $task->description !!}</li>
                                                </ul>

                                                <div class="team float-left">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- end task card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">In Progress</h4>
                            <div id="inprogress-task" class="pb-1 task-list">
                                @foreach ($tasks as $task)
                                    @if ($task->status == 2)
                                        <div class="card task-box">
                                            <div class="card-body">
                                                <div class="float-right ml-2">
                                                    <div class="dropdown float-right">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ url('/task_complete', $task->id) }}">Complete</a>
                                                            <a class="dropdown-item"
                                                                href="">Delete</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->
                                                </div>
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">{{ $task->name }}</a></h5>
                                                    <p class="text-muted">{{ $task->date }}</p>
                                                </div>

                                                <ul class="pl-3 mb-4 text-muted">
                                                    <li class="py-1">{!! $task->description !!}</li>
                                                </ul>

                                                <div class="team float-left">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- end task card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Completed</h4>
                            <div id="complete-task" class="pb-1 task-list">
                                @foreach ($tasks as $task)
                                    @if ($task->status == 3)
                                        <div class="card task-box">
                                            <div class="card-body">
                                                <div class="float-right ml-2">
                                                    <div class="dropdown float-right">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="">Accept</a>
                                                            <a class="dropdown-item"
                                                                href="">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="">Delete</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->
                                                </div>
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">{{ $task->name }}</a></h5>
                                                    <p class="text-muted">{{ $task->date }}</p>
                                                </div>

                                                <ul class="pl-3 mb-4 text-muted">
                                                    <li class="py-1">{!! $task->description !!}</li>
                                                </ul>

                                                <div class="team float-left">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="{{ asset('images/tasks/' . $task->image) }}" class="rounded-circle avatar-xs m-1" alt="Task">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- end task card -->
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
