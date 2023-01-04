@extends('master')
@section('title')
Projects List
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
                        <h4 class="mb-0 font-size-18">Projects List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                <li class="breadcrumb-item active">Projects List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        @if (session('project_create'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('project_create') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table project-list-table table-nowrap table-centered table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px">#</th>
                                        <th scope="col">Projects</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key => $project)
                                        @if ($project->status == 1)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                {{-- <td>{{ $projects->firstItem() + $key }}</td> --}}
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/projects_overview', $project->id) }}" class="text-dark">{{ $project->name }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $project->type }}</p>
                                                </td>
                                                <td>{{ $project->end_date }}</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('/projects_accept', $project->id) }}">Accept</a>
                                                            <a class="dropdown-item" href="{{ url('/project_edit', $project->id) }}">Edit</a>
                                                            <a class="dropdown-item" href="project_delete.php">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($projects as $project)
                                        @if ($project->status == 2)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                {{-- <td>{{ $projects->firstItem() + $key }}</td> --}}
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#"
                                                            class="text-dark">{{ $project->name }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $project->type }}</p>
                                                </td>
                                                <td>{{ $project->end_date }}</td>
                                                <td><span class="badge badge-primary">Working</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('/projects_complete', $project->id) }}">Complete</a>
                                                            <a class="dropdown-item" href="{{ url('/project_edit', $project->id) }}">Edit</a>
                                                            <a class="dropdown-item" href="project_delete.php">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($projects as $project)
                                        @if ($project->status == 3)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                {{-- <td>{{ $projects->firstItem() + $key }}</td> --}}
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#"
                                                            class="text-dark">{{ $project->name }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $project->type }}</p>
                                                </td>
                                                <td>{{ $project->end_date }}</td>
                                                <td><span class="badge badge-success">Complete</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('/project_edit', $project->id) }}">Edit</a>
                                                            <a class="dropdown-item" href="project_delete.php">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($projects as $project)
                                        @if ($project->status == 4)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                {{-- <td>{{ $projects->firstItem() + $key }}</td> --}}
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#"
                                                            class="text-dark">{{ $project->name }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $project->type }}</p>
                                                </td>
                                                <td>{{ $project->end_date }}</td>
                                                <td><span class="badge badge-danger">Delay</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="project_delete.php">Delete</a>
                                                        </div>
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
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="text-center my-3">
                        {{-- {{ $projects->links() }} --}}
                    </div>
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
