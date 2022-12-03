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
                        <h4 class="mb-0 font-size-18">Attendance</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Attendance</a></li>
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
                            <table class="table table-nowrap table-centered table-bordered">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Attendance</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendance as $attend)
                                        <tr>
                                            <td>
                                                <h5 class="text-truncate font-size-14"><a href="#"
                                                        class="text-dark">{{ $attend->user_id }}</a></h5>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14"><a href="#"
                                                        class="text-dark">{{ $attend->Attendance->name }}</a></h5>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14"><a href="#"
                                                        class="text-dark">{{ $attend->attend }}</a></h5>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14"><a href="#"
                                                        class="text-dark">{{ $attend->date }}</a></h5>
                                            </td>
                                        </tr>
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
