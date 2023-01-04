@extends('master')
@section('title')
Projects Grid
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
                        <h4 class="mb-0 font-size-18">Projects Grid</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                <li class="breadcrumb-item active">Projects Grid</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                @foreach ($projects as $item)
                    @if ($item->status == 1)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md mr-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/companies/img-2.png" alt="" height="30">
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="{{ url('/projects_overview', $item->id) }}" class="text-dark">{{ $item->name }}</a></h5>
                                            <p class="text-muted mb-4">{{ $item->type }}</p>
                                            <div class="team">
                                                <a href="javascript: void(0);" class="team-member d-inline-block"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Kenneth Johnson">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="rounded-circle avatar-xs m-1" alt="">
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mr-2">
                                            <span class="badge badge-warning">Pending</span>
                                        </li>
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->start_date }}
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->end_date }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($projects as $item)
                    @if ($item->status == 2)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md mr-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/companies/img-2.png" alt="" height="30">
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="{{ url('/projects_overview', $item->id) }}" class="text-dark">{{ $item->name }}</a></h5>
                                            <p class="text-muted mb-4">{{ $item->type }}</p>
                                            <div class="team">
                                                <a href="javascript: void(0);" class="team-member d-inline-block"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Kenneth Johnson">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="rounded-circle avatar-xs m-1" alt="">
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mr-2">
                                            <span class="badge badge-primary">Working</span>
                                        </li>
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->start_date }}
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->end_date }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($projects as $item)
                    @if ($item->status == 3)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md mr-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/companies/img-2.png" alt="" height="30">
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="{{ url('/projects_overview', $item->id) }}" class="text-dark">{{ $item->name }}</a></h5>
                                            <p class="text-muted mb-4">{{ $item->type }}</p>
                                            <div class="team">
                                                <a href="javascript: void(0);" class="team-member d-inline-block"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Kenneth Johnson">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="rounded-circle avatar-xs m-1" alt="">
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mr-2">
                                            <span class="badge badge-success">Complete</span>
                                        </li>
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->start_date }}
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->end_date }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($projects as $item)
                    @if ($item->status == 4)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md mr-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/companies/img-2.png" alt="" height="30">
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="{{ url('/projects_overview', $item->id) }}" class="text-dark">{{ $item->name }}</a></h5>
                                            <p class="text-muted mb-4">{{ $item->type }}</p>
                                            <div class="team">
                                                <a href="javascript: void(0);" class="team-member d-inline-block"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Kenneth Johnson">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="rounded-circle avatar-xs m-1" alt="">
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mr-2">
                                            <span class="badge badge-danger">Delay</span>
                                        </li>
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->start_date }}
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Due Date">
                                            <i class="bx bx-calendar mr-1"></i> {{ $item->end_date }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    {{-- {{ $projects->links() }} --}}
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
