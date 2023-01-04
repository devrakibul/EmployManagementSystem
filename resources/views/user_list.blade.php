@extends('master')
@section('title')
Users
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
                        <h4 class="mb-0 font-size-18">All Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                <li class="breadcrumb-item active">Users List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h3 class="card-title mb-3 mt-3 text-center">Admin</h3>
                        @if (session('MakeAdmin'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('MakeAdmin') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table project-list-table table-nowrap table-centered table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_list as $key => $user)
                                            @if ($user->status == 1)
                                            <tr>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->id }}</a></h5>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->name }}</a></h5>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->email }}</a></h5>
                                                </td>
                                                <td><span class="badge badge-primary">Admin</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('/make_membern', $user->id) }}">Make Employee</a>
                                                            <a class="dropdown-item" href="{{ url('/user_view', $user->id) }}">View</a>
                                                            <a class="dropdown-item" href="{{ url('/profile') }}">Delete</a>
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
                    <div class="card">
                        <h3 class="card-title mb-3 mt-3 text-center">Employes</h3>
                        @if (session('MakeMember'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('MakeMember') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table project-list-table table-nowrap table-centered table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 100px">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_list as $key => $user)
                                        @if ($user->status == 2)
                                            <tr>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->id }}</a></h5>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->name }}</a></h5>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="{{ url('/user_view', $user->id) }}"
                                                            class="text-dark">{{ $user->email }}</a></h5>
                                                </td>
                                                <td><span class="badge badge-success">Member</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('/make_admin', $user->id) }}">Make Admin</a>
                                                            <a class="dropdown-item" href="{{ url('/user_view', $user->id) }}">View</a>
                                                            <a class="dropdown-item" href="{{ url('/user_delete', $user->id) }}">Delete</a>
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

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
