@extends('master')
@section('title')
Project Create
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
                        <h4 class="mb-0 font-size-18">Create New</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                <li class="breadcrumb-item active">Create New</li>
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
                            <h4 class="card-title mb-4">Create New Project</h4>
                            @if(isset($error))
                                <?php $errors = json_decode(json_encode($error), true); ?>
                            @endif
                            <span id="submit_error"></span>
                            <form action="{{ url('project_post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="ProjectName" class="col-form-label col-lg-2">Project Name</label>
                                    <div class="col-lg-10 input_group">
                                        <input id="ProjectName" name="name" type="text" onkeyup="validateProjectName()"
                                            class="form-control @if(isset($error) && isset($errors["name"][0])) is-invalid @endif"
                                            placeholder="Enter Project Name...">
                                            <span class="script_error" id="ProjectName_error"></span>
                                        @if(isset($error) && isset($errors["name"][0]))
                                        <div class="alert alert-danger">{{ $errors["name"][0] }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4 input_group">
                                    <label for="ProjectType" class="col-form-label col-lg-2">Project Type</label>
                                    <div class="col-lg-10">
                                        <input id="ProjectType" name="type" type="text" onkeyup="validateProjectType()"
                                            class="form-control @if(isset($error) && isset($errors["type"][0])) is-invalid @endif"
                                            placeholder="Enter Project Type...">
                                            <span class="script_error" id="ProjectType_error"></span>
                                        @if(isset($error) && isset($errors["type"][0]))
                                        <div class="alert alert-danger">{{ $errors["type"][0] }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4 input_group">
                                    <label for="description" class="col-form-label col-lg-2">Project Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control summernote @if(isset($error) && isset($errors["description"][0])) is-invalid @endif"
                                            id="summernote" name="description" onkeyup="validateProjectDescription()"
                                            placeholder="Enter Project Description..."></textarea>
                                            <span class="script_error" id="ProjectDescription_error"></span>
                                        @if(isset($error) && isset($errors["description"][0]))
                                        <div class="alert alert-danger">{{ $errors["description"][0] }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Project Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker"
                                            data-date-format="dd M, yyyy" data-date-autoclose="true">
                                            <div class="input_group col-6">
                                                <input type="text" class="form-control @if(isset($error) && isset($errors["start_date"][0])) is-invalid @endif"
                                                    placeholder="Start Date" name="start_date" id="ProjectStartDate" onchange="validateProjectStartDate()"/>
                                                    <span class="script_error" id="ProjectStartDate_error"></span>
                                                @if(isset($error) && isset($errors["start_date"][0]))
                                                <div class="alert alert-danger">{{ $errors["start_date"][0] }}</div>
                                                @endif
                                            </div>
                                            <div class="input_group col-6">
                                                <input type="text" class="form-control @if(isset($error) && isset($errors["end_date"][0])) is-invalid @endif"
                                                    placeholder="End Date" name="end_date" id="ProjectEndDate" onchange="validateProjectEndDate()"/>
                                                    <span class="script_error" id="ProjectEndDate_error"></span>
                                                @if(isset($error) && isset($errors["end_date"][0]))
                                                <div class="alert alert-danger">{{ $errors["end_date"][0] }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Attached Image</label>
                                    <div class="col-lg-10">
                                        <div id="images">
                                            <!-- innner repeater -->
                                            <div class="inner-repeater row">
                                                <div class="col-10">
                                                    <div data-repeater-list="inner-list">
                                                        <div data-repeater-item class="row mb-2 remove_image">
                                                            <div class="col-10 input_group">
                                                                <input type="file" name="image[]" onchange="validateProjectImages()"
                                                                    class="form-control @if(isset($error) && isset($errors["image"][0])) is-invalid @endif"
                                                                    id="ProjectImages" accept="image/*">
                                                                    <span class="script_error" id="ProjectImages_error"></span>
                                                                @if(isset($error) && isset($errors["image"][0]))
                                                                <div class="alert alert-danger">{{ $errors["image"][0] }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="delete_image btn btn-danger project_btn"><i
                                                                        class="fa fa-trash"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <span id="add_image" class="btn btn-success project_btn"><i
                                                            class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Attached Files</label>
                                    <div class="col-lg-10">
                                        <!-- outer repeater -->
                                        <div id="files">
                                            <!-- innner repeater -->
                                            <div class="inner-repeater row">
                                                <div class="col-10">
                                                    <div data-repeater-list="inner-list">
                                                        <div data-repeater-item class="row mb-2 remove_file">
                                                            <div class="col-10 input_group">
                                                                <input type="file" name="file[]" onchange="validateProjectFiles()"
                                                                    class="form-control @if(isset($error) && isset($errors["file"][0])) is-invalid @endif"
                                                                    id="ProjectFiles"
                                                                    accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                                    <span class="script_error" id="ProjectFiles_error"></span>
                                                                @if(isset($error) && isset($errors["file"][0]))
                                                                <div class="alert alert-danger">{{ $errors["file"][0] }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="delete_file btn btn-danger project_btn"><i
                                                                        class="fa fa-trash"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <span id="add_file" class="btn btn-success project_btn"><i
                                                            class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Add Team Member</label>
                                    <div class="col-lg-10">
                                        <!-- outer repeater -->
                                        <div id="items">
                                            <div data-repeater-list="outer-list">
                                                <div data-repeater-item>

                                                    <!-- innner repeater -->
                                                    <div class="inner-repeater row">
                                                        <div class="col-10">
                                                            <div data-repeater-list="inner-list">
                                                                <div data-repeater-item class="row mb-2 remove_row">
                                                                    <div class="col-10 input_group">
                                                                        <select
                                                                            class="inner form-control @if(isset($error) && isset($errors["member_id.0"][0])) is-invalid @endif"
                                                                            name="member_id[]" id="ProjectMembers" onchange="validateProjectMembers()">
                                                                            <option value="">Select Member</option>
                                                                            @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="script_error" id="ProjectMembers_error"></span>
                                                                        @if(isset($error) && isset($errors["member_id.0"][0]))
                                                                        <div class="alert alert-danger">{{ $errors["member_id.0"][0] }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <span
                                                                            class="delete btn btn-danger project_btn"><i
                                                                                class="fa fa-trash"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <span id="add" class="btn btn-success project_btn"><i
                                                                    class="fa fa-plus"></i></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Project</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
    @section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {

            $(".delete_image").remove();
            //when the Add Field button is clicked
            $("#add_image").click(function (e) {
                $(".delete_image").fadeIn("1500");
                //Append a new row of code to the "#files" div
                $("#images").append(
                    `<div id="images">
                    <div class="inner-repeater row">
                        <div class="col-10">
                            <div data-repeater-list="inner-list">
                                <div data-repeater-item class="row mb-2 remove_image">
                                    <div class="col-10">
                                        <input type="file" name="image[]" class="form-control" id="image" accept="image/*">
                                    </div>
                                    <div class="col-2">
                                        <span class="delete_image btn btn-danger project_btn"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
                );
            });

            $(Document).on("click", ".delete_image", function (e) {
                $(this).closest(".remove_image").remove();
            });

        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(".delete_file").remove();
            //when the Add Field button is clicked
            $("#add_file").click(function (e) {
                $(".delete_file").fadeIn("1500");
                //Append a new row of code to the "#files" div
                $("#files").append(
                    `<div id="files">
                    <div class="inner-repeater row">
                        <div class="col-10">
                            <div data-repeater-list="inner-list">
                                <div data-repeater-item class="row mb-2 remove_file">
                                    <div class="col-10">
                                        <input type="file" name="file[]" value="{{ old('file') }}" class="form-control" id="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                    </div>
                                    <div class="col-2">
                                        <span class="delete_file btn btn-danger project_btn"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
                );
            });

            $(Document).on("click", ".delete_file", function (e) {
                $(this).closest(".remove_file").remove();
            });

        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(".delete").remove();
            //when the Add Field button is clicked
            $("#add").click(function (e) {
                $(".delete").fadeIn("1500");
                //Append a new row of code to the "#items" div
                $("#items").append(
                    `<div id="items">
                    <div data-repeater-list="outer-list">
                        <div data-repeater-item>

                            <!-- innner repeater -->
                            <div class="inner-repeater row">
                                <div class="col-10">
                                    <div data-repeater-list="inner-list">
                                        <div data-repeater-item class="row mb-2 remove_row">
                                            <div class="col-10">
                                                <select class="inner form-control"
                                                    name="member_id[]">
                                                    <option value="">Select Member</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <span class="delete btn btn-danger project_btn"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>`
                );
            });

            $(Document).on("click", ".delete", function (e) {
                $(this).closest(".remove_row").remove();
            });

        });

    </script>
    @endsection
