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
                            <form class="form-horizontal" action="{{ url('/profile_update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $profile_edit->id }}">

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Phone -->
                                        <div class="col-6 input_group">
                                            <label for="input_phone" class="form-label"
                                                style="display: block;">Phone</label>
                                            <input type="tel" name="phone" class="form-control" id="input_phone"
                                                onkeyup="validatePhone()" placeholder="Enter Your Phone Number"
                                                value="{{ $profile_edit->phone }}">
                                            <span class="script_error" id="phone_error"></span>
                                        </div>
                                        <!-- Designation -->
                                        <div class="col-6 input_group">
                                            <label for="designation" class="form-label">Designation</label>
                                            <input type="text" name="designation" class="form-control" id="designation"
                                                onchange="validateDesignation()"  placeholder="Enter Your designation" value="{{ $profile_edit->designation }}">
                                            <span class="script_error" id="designation_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Present Address -->
                                        <div class="col-12 input_group">
                                            <label for="present_address" class="form-label">Present Address</label>
                                            <input type="text" name="present_address" class="form-control"
                                                id="present_address" onkeyup="validateSPresentAddress()"
                                                placeholder="Enter Your Street Addres"
                                                value="{{ $profile_edit->present_address }}">
                                            <span class="script_error" id="present_address_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Date of Birth -->
                                        <div class="col-6 input_group">
                                            <label for="dof" class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" id="dof"
                                                onchange="validateDOF()" value="{{ $profile_edit->date_of_birth }}">
                                            <span class="script_error" id="dof_error"></span>
                                        </div>
                                        <!-- Facebook -->
                                        <div class="col-6 input_group">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" class="form-control" id="facebook"
                                                onchange="validateFacebook()"  placeholder="Enter Your Facebook Link" value="{{ $profile_edit->facebook }}">
                                            <span class="script_error" id="facebook_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Twitter -->
                                        <div class="col-6 input_group">
                                            <label for="twitter" class="form-label">Twitter</label>
                                            <input type="text" name="twitter" class="form-control"
                                                id="twitter" onchange="validateTwitter()"  placeholder="Enter Your Twitter Link" value="{{ $profile_edit->twitter }}">
                                            <span class="script_error" id="twitter_error"></span>
                                        </div>
                                        <!-- Linkdin -->
                                        <div class="col-6 input_group">
                                            <label for="linkdin" class="form-label">Linkdin</label>
                                            <input type="text" name="linkdin" class="form-control" id="linkdin"
                                                onchange="validateLinkdin()"  placeholder="Enter Your Linkdin Link" value="{{ $profile_edit->linkdin }}">
                                            <span class="script_error" id="linkdin_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Github -->
                                        <div class="col-6 input_group">
                                            <label for="github" class="form-label">Github</label>
                                            <input type="text" name="github" class="form-control"
                                                id="github" onchange="validateGithub()"  placeholder="Enter Your Github Link" value="{{ $profile_edit->github }}">
                                            <span class="script_error" id="github_error"></span>
                                        </div>
                                        <!-- Website -->
                                        <div class="col-6 input_group">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="text" name="website" class="form-control"
                                                id="website" onchange="validateWebsite()"  placeholder="Enter Your Website Link" value="{{ $profile_edit->website }}">
                                            <span class="script_error" id="website_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <!-- Image -->
                                        <div class="col-6 input_group">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" accept="image/*"
                                                id="image" onchange="validateImage()" value="{{ $profile_edit->image }}">
                                            <span class="script_error" id="image_error"></span>
                                        </div>
                                        <!-- Image -->
                                        <div class="col-6 input_group">
                                            <label for="cv" class="form-label">CV</label>
                                            <input type="file" name="cv" class="form-control"  accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                id="cv" onchange="validateCV()" value="{{ $profile_edit->cv }}">
                                            <span class="script_error" id="cv_error"></span>
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
