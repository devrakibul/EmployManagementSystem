@extends('master')
@section('title')
Projects Overview
@endsection
@section('content')
<?php
    $project = $projects[0];
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <input type="hidden" name="id" value="{{ $project->id }}">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Projects Overview</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/project_list') }}">Projects</a></li>
                                <li class="breadcrumb-item active">Projects Overview</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img src="{{ asset('assets/images/companies/img-1.png') }}" alt="" class="avatar-sm mr-4">

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">{{  $project->name  }}</h5>
                                </div>
                            </div>

                            <h5 class="font-size-15 mt-4">Project Details :</h5>

                            <p class="text-muted">{!!  $project->description  !!}</p>

                            <div class="row task-dates">
                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> Start
                                            Date</h5>
                                        <p class="text-muted mb-0">{{  $project->start_date  }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i>
                                            Due Date</h5>
                                        <p class="text-muted mb-0">{{  $project->end_date  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Team Members</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap">
                                    <tbody>
                                        @foreach ($projects as $member)
                                            @if($member)

                                            <?php //dd($member->getMember); ?>
                                                <tr>

                                                    <td><img src="{{ asset('images/users/' . $member->image) }}"
                                                            class="rounded-circle avatar-xs" alt=""></td>
                                                    <td>
                                                        <h5 class="font-size-14 m-0"><a href="#" class="text-dark">{{ $member->name }}</a></h5>
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

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Overview</h4>

                            <div id="overview-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Attached Files</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered table-hover mb-0">
                                    <tbody>
                                        @foreach ($project->project_image as $image)
                                            <tr>
                                                <td style="width: 45px;">
                                                    <div class="avatar-sm">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            <img src="{{ asset('images/project_image/' . $image->image) }}" alt="{{ $project->name }}" width="100%">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 mb-1"><a href="{{ asset('images/project_image/' . $image->image) }}" class="text-dark">{{ $image->image }}</a></h5>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="{{ asset('images/project_image/' . $image->image) }}" class="text-dark"><i
                                                                class="bx bx-download h3 m-0"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($project->files as $file)
                                            <tr>
                                                <td style="width: 45px;">
                                                    <div class="avatar-sm">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary font-size-24">
                                                            <i class="bx bxs-file-doc"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 mb-1"><a href="{{ asset('files/' . $file->file) }}" class="text-dark">{{ $file->file }}</a></h5>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="{{ asset('files/' . $file->file) }}" class="text-dark"><i
                                                                class="bx bx-download h3 m-0"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
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
                            <h4 class="card-title mb-4">Comments</h4>

                            <div class="media mb-4">
                                <div class="mr-3">
                                    <img class="media-object rounded-circle avatar-xs" alt=""
                                        src="assets/images/users/avatar-2.jpg">
                                </div>
                                <div class="media-body">
                                    <h5 class="font-size-13 mb-1">David Lambert</h5>
                                    <p class="text-muted mb-1">
                                        Separate existence is a myth.
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <a href="#" class="text-primary">Reply</a>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <div class="mr-3">
                                    <img class="media-object rounded-circle avatar-xs" alt=""
                                        src="assets/images/users/avatar-3.jpg">
                                </div>
                                <div class="media-body">
                                    <h5 class="font-size-13 mb-1">Steve Foster</h5>
                                    <p class="text-muted mb-1">
                                        <a href="#" class="text-success">@Henry</a>
                                        To an English person it will like simplified
                                    </p>
                                    <div class="media mt-3">
                                        <div class="avatar-xs mr-3">
                                            <span
                                                class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                J
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="font-size-13 mb-1">Jeffrey Walker</h5>
                                            <p class="text-muted mb-1">
                                                as a skeptical Cambridge friend
                                            </p>
                                        </div>
                                        <div class="ml-3">
                                            <a href="#" class="text-primary">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <a href="#" class="text-primary">Reply</a>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                        S
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h5 class="font-size-13 mb-1">Steven Carlson</h5>
                                    <p class="text-muted mb-1">
                                        Separate existence is a myth.
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <a href="#" class="text-primary">Reply</a>
                                </div>
                            </div>

                            <div class="text-center mt-4 pt-2">
                                <a href="#" class="btn btn-primary btn-sm">View more</a>
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
