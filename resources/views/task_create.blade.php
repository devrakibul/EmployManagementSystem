@extends('master')
@section('title')
Task Create
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Create Task</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                <li class="breadcrumb-item active">Create Task</li>
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
                            <h4 class="card-title mb-4">Create New Task</h4>
                            <form action="{{ url('/task_post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Task Name</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Task Name...">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2" for="description">Task Description</label>
                                    <div class="col-lg-10">
                                        <textarea name="description" class="summernote @error('description') is-invalid @enderror" id="description"
                                            placeholder="Enter Task Description"></textarea>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2" for="date">Task Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control @error('date') is-invalid @enderror" placeholder="Task Date"
                                                name="date"/>
                                                @error('date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="image" class="col-form-label col-lg-2">Task Image</label>
                                    <div class="col-lg-10">
                                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Task</button>
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
