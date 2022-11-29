@extends('master')
@section('title')
Profile Edit
@endsection
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Profile Edit</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/employee_profile') }}">Profile</a></li>
                                <li class="breadcrumb-item active">Profile Edit</li>
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
                            <h2 class="text-center">Profile Edit</h2>
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <!-- Name -->
                                            <div class="col-12 input_group">
                                                <label for="name" class="form-label"
                                                    style="display: block;">Full Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    onkeyup="validateName()" placeholder="Enter Your Full Name"
                                                    value="{{ old('name', $user->name) }}">
                                                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                                <span class="script_error" id="name_error"></span>
                                            </div>
                                            <!-- Email -->
                                            <div class="col-12 input_group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    onchange="validateEmail()" value="{{ old('email', $user->email) }}">
                                                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
                                                <span class="script_error" id="email_error"></span>
                                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                    <div>
                                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                            Your email address is unverified.

                                                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                                {{ __('Click here to re-send the verification email.') }}
                                                            </button>
                                                        </p>

                                                        @if (session('status') === 'verification-link-sent')
                                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                                {{ __('A new verification link has been sent to your email address.') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    type="submit">Update</button>
                                                @if (session('status') === 'profile-updated')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400"
                                                    >Update Success.</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </form>
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
