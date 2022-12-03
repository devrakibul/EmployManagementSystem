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
                            <form action="{{ url('project_post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Project Name</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Project Name...">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="type" class="col-form-label col-lg-2">Project Type</label>
                                    <div class="col-lg-10">
                                        <input id="type" name="type" type="text"
                                            class="form-control @error('type') is-invalid @enderror"
                                            placeholder="Enter Project Type...">
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="description" class="col-form-label col-lg-2">Project Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control summernote @error('description') is-invalid @enderror"
                                            id="summernote" name="description" rows="3"
                                            placeholder="Enter Project Description..."></textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Project Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker"
                                            data-date-format="dd M, yyyy" data-date-autoclose="true">
                                            <input type="text" class="form-control @error('start_date') is-invalid @enderror"
                                                placeholder="Start Date" name="start_date" />
                                            @error('start_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" class="form-control @error('end_date') is-invalid @enderror"
                                                placeholder="End Date" name="end_date" />
                                            @error('end_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
                                                            <div class="col-10">
                                                                <input type="file" name="image[]"
                                                                    class="form-control @error('image') is-invalid @enderror"
                                                                    id="image" accept="image/*">
                                                                @error('image')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
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
                                                            <div class="col-10">
                                                                <input type="file" name="file[]"
                                                                    class="form-control @error('file') is-invalid @enderror"
                                                                    id="file"
                                                                    accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                                @error('file')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
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
                                                                    <div class="col-10">
                                                                        <select
                                                                            class="inner form-control @error('member_id') is-invalid @enderror"
                                                                            name="member_id[]">
                                                                            <option value="" class="@error('member_id') is-invalid @enderror">Select Member</option>
                                                                            @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('member_id')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
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
