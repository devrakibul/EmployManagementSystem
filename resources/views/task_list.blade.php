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
                <div class="col-lg-8">
                    <div class="card">
                        @if (session('task_insert'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('task_insert') }}
                            </div>
                        @endif
                        @if (session('task_edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('task_edit') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title mb-4">Upcoming</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
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
                            <h4 class="card-title mb-4">In Progress</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
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
                                                        <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                                class="text-dark">{{ $task->name }}</a></h5>
                                                    </td>
                                                    <td>
                                                        <div class="team">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="">
                                                                <img src="" class="rounded-circle avatar-xs m-1" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span
                                                                class="badge badge-pill badge-soft-primary font-size-11">Working</span>
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
                                                        <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                                class="text-dark">{{ $task->name }}</a></h5>
                                                    </td>
                                                    <td>
                                                        <div class="team">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="">
                                                                <img src="" class="rounded-circle avatar-xs m-1" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span
                                                                class="badge badge-pill badge-soft-success font-size-11">Complete</span>
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Tasks</h4>

                            <div id="task-chart" class="apex-charts"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Recent Tasks</h4>

                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                        class="text-dark">Brand logo design</a></h5>
                                            </td>
                                            <td>
                                                <div class="team">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="assets/images/users/avatar-7.jpg"
                                                            class="rounded-circle avatar-xs m-1" alt="">
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                        class="text-dark">Create a Blog Template UI</a></h5>
                                            </td>
                                            <td>
                                                <div class="team">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <div class="avatar-xs">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </a>

                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="assets/images/users/avatar-8.jpg"
                                                            class="rounded-circle avatar-xs m-1" alt="">
                                                    </a>

                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="assets/images/users/avatar-1.jpg"
                                                            class="rounded-circle avatar-xs m-1" alt="">
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="text-truncate font-size-14 m-0"><a href="#"
                                                        class="text-dark">Redesign - Landing page</a></h5>
                                            </td>
                                            <td>
                                                <div class="team">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="assets/images/users/avatar-7.jpg"
                                                            class="rounded-circle avatar-xs m-1" alt="">
                                                    </a>
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <img src="assets/images/users/avatar-4.jpg"
                                                            class="rounded-circle avatar-xs m-1" alt="">
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table responsive -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
