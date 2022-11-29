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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <a href="{{ asset('images/tasks/' . $task->image) }}"><img src="{{ asset('images/tasks/' . $task->image) }}" alt="" class="avatar-sm mr-4"></a>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">{{  $task->name  }}</h5>
                                </div>
                            </div>

                            <h5 class="font-size-15 mt-4">Task Details :</h5>

                            <p class="text-muted">{!!  $task->description  !!}</p>

                            <div class="row task-dates">
                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> Task
                                            Date</h5>
                                        <p class="text-muted mb-0">{{  $task->date  }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-user mr-1 text-primary"></i>
                                            User ID</h5>
                                        <p class="text-muted mb-0">{{  $task->user_id  }}</p>
                                    </div>
                                </div>
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
