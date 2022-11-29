@extends('master')
@section('title')
Employee Profile
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
                        <h4 class="mb-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Profile</h2>
                            @if (session('ProfileEdit'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('ProfileEdit') }}
                                </div>
                            @endif
                            @if (session('OtherProfileEdit'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('OtherProfileEdit') }}
                                </div>
                            @endif
                            <div class="profile_img">
                                <img src="{{ asset('images/users/' . $user->image) }}" alt="{{ $user->name }}">
                            </div>
                            <div class="profile_name text-center">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user->email }}</p>
                                    <a href="{{ route('profile.edit') }}" class="n_e_e"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div class="profile_about">
                                <p><i class="fa-solid fa-briefcase"></i> {{ $user->designation }}</p>
                                <p><i class="fa-solid fa-cake-candles"></i> {{ $user->date_of_birth }}</p>
                                <p><i class="fa-solid fa-location-dot"></i> {{ $user->present_address }}</p>
                                <p><i class="fa-solid fa-phone"></i> {{ $user->phone }}</p>
                                <p><a href="{{ asset('files/users/' . $user->cv) }}"><i class="bx bxs-file-doc"></i> My CV</a></p>
                            </div>
                            <div class="profile_social">
                                <a target="_blank" href="{{ $user->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                <a target="_blank" href="{{ $user->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                <a target="_blank" href="{{ $user->linkdin }}"><i class="fa-brands fa-linkedin"></i></a>
                                <a target="_blank" href="{{ $user->github }}"><i class="fa-brands fa-github"></i></a>
                                <a target="_blank" href="{{ $user->website }}"><i class="fa-solid fa-globe"></i></a>
                            </div>
                            <div class="profile_btn text-right">
                                <a href="{{ route('profile_edit', $user->id) }}"> <i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Other Details</h2>
                            <div class="other_details">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Father Name</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->father_name }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Mother Name</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->mother_name }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Permanent Address</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->permanent_address }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Gender</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->gender }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Maritial Status</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->maritial_status }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Nationality</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->nationality }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">National ID No</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->nationalid }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Bank Name</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->bank }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="value_name">Bank AC No</label>
                                    </div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="value">{{ $user->bank_ac }}</span>
                                    </div>
                                </div>
                                <div class="profile_btn text-right">
                                    <a href="{{ route('other_profile_edit', $user->id) }}"> <i class="fa-solid fa-pen-to-square"></i></a>
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
