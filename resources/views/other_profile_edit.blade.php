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
                            <form class="form-horizontal" action="{{ url('/other_profile_update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $other_profile_edit->id }}">

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Phone -->
                                        <div class="col-6 input_group">
                                            <label for="father_name" class="form-label"
                                                style="display: block;">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" id="father_name"
                                                onkeyup="validateFatherName()" placeholder="Enter Your Father Name"
                                                value="{{ $other_profile_edit->father_name }}">
                                            <span class="script_error" id="father_name_error"></span>
                                        </div>
                                        <!-- Designation -->
                                        <div class="col-6 input_group">
                                            <label for="mother_name" class="form-label">Mother Name</label>
                                            <input type="text" name="mother_name" class="form-control" id="mother_name"
                                                onchange="validateMotherName()" placeholder="Enter Your Mother Name" value="{{ $other_profile_edit->mother_name }}">
                                            <span class="script_error" id="mother_name_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Permanent Address -->
                                        <div class="col-12 input_group">
                                            <label for="permanent_address" class="form-label">Permanent Address</label>
                                            <input type="text" name="permanent_address" class="form-control"
                                                id="permanent_address" onkeyup="validatePermanentAddress()" placeholder="Enter Your Permanent Address"
                                                value="{{ $other_profile_edit->permanent_address }}">
                                            <span class="script_error" id="permanent_address_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Gender -->
                                        <div class="col-6 input_group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="select_gender">
                                                <input type="radio" name="gender" id="male" value="Male"
                                                @if ($other_profile_edit->gender == 'Male')
                                                    {{ 'checked' }}
                                                @endif
                                                >
                                                <label for="male"> Male</label>
                                                <input type="radio" name="gender" id="female" value="Female"
                                                @if ($other_profile_edit->gender == 'Female')
                                                    {{ 'checked' }}
                                                @endif
                                                >
                                                <label for="female"> Female</label>
                                            </div>
                                        </div>
                                        <!-- Maritial Status -->
                                        <div class="col-6 input_group">
                                            <label for="maritial_status" class="form-label">Maritial Status</label>
                                            <div class="select_status">
                                                <input type="radio" name="maritial_status" id="single" value="Single"
                                                @if ($other_profile_edit->maritial_status == 'Single')
                                                    {{ 'checked' }}
                                                @endif
                                                >
                                                <label for="single"> Single</label>
                                                <input type="radio" name="maritial_status" id="married" value="Married"
                                                @if ($other_profile_edit->maritial_status == 'Married')
                                                    {{ 'checked' }}
                                                @endif
                                                >
                                                <label for="married"> Married</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- nationality -->
                                        <div class="col-6 input_group">
                                            <label for="nationality" class="form-label">Nationality</label>
                                            <input type="text" name="nationality" class="form-control"
                                                id="nationality" onchange="validateNationality()" placeholder="Enter Your Nationality Link" value="{{ $other_profile_edit->nationality }}">
                                            <span class="script_error" id="nationality_error"></span>
                                        </div>
                                        <!-- National ID No -->
                                        <div class="col-6 input_group">
                                            <label for="nationalid" class="form-label">National ID No</label>
                                            <input type="text" name="nationalid" class="form-control" id="nationalid"
                                                onchange="validateNationalID()" placeholder="Enter Your National ID No" value="{{ $other_profile_edit->nationalid }}">
                                            <span class="script_error" id="nationalid_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Bank Name -->
                                        <div class="col-6 input_group">
                                            <label for="bank" class="form-label">Bank Name</label>
                                            <input type="text" name="bank" class="form-control"
                                                id="bank" onchange="validateBank()" placeholder="Enter Your Bank Name" value="{{ $other_profile_edit->bank }}">
                                            <span class="script_error" id="bank_error"></span>
                                        </div>
                                        <!-- Bank AC -->
                                        <div class="col-6 input_group">
                                            <label for="bank_ac" class="form-label">Bank AC No</label>
                                            <input type="text" name="bank_ac" class="form-control"
                                                id="bank_ac" onchange="validateBankAC()" placeholder="Enter Your Bank AC No" value="{{ $other_profile_edit->bank_ac }}">
                                            <span class="script_error" id="bank_ac_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light"
                                        type="submit">Update</button>
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
