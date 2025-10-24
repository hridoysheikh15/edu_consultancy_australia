@extends('admin.layouts.app')
@section('title', '| Course Page')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Course Page</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Course Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('course.layout.update') }}" method="post"
                    class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Course Header</label>
                        <input type="text" id="header" name="header"
                            value="{{ old('header', $layout?->course_header) }}"
                            class="form-control @error('header') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Course Sub Title</label>
                        <input type="text" id="sub_title" name="sub_title"
                            value="{{ old('sub_title', $layout?->course_sub_title) }}"
                            class="form-control @error('sub_title') is-invalid @enderror">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info ">Sumbit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <h5 class="fw-bold">Manage Course</h5>
                        </div>
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link nav-padding  active" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">All Course</a>
                                    <a class="nav-item nav-link nav-padding" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span
                                            class="ti-plus"></span> Add New</a>
                                </div>
                            </nav>

                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="mt-4">
                                        <table id="bootstrap-data-table" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($courses as $course)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="text-center"><img class="table-img"
                                                            src="{{ asset($course?->image) ?? asset('globalImage/placeholderImg.jpg') }}"
                                                            alt=""></td>
                                                        <td>
                                                            {{ $course?->name }}
                                                        </td>

                                                        <td>
                                                           <div style="margin-left: 10px;">
                                                                {!! $course?->description !!}
                                                           </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center"
                                                            style="gap: 10px" >
                                                                <a href="{{ route('course.edit', $course?->id) }}"
                                                                    class="btn btn-outline-primary btn-sm">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form action="{{ route('course.delete', $course?->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger btn-sm delete">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No Data Found</td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                    <div class="mt-4">
                                        <form action="{{ route('course.store') }}" method="post"enctype="multipart/form-data"
                                           class="form-horizontal">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="image">Logo</label>
                                                <small>Image size should not be greater than 2 MB.</small>
                                                <input class="form-control mb-3 image @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" required>
                                                <div class="preview-img">
                                                    <img src="{{ asset('front_assets/img/preview.webp') }}" alt="Preview" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror" required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" cols="30" rows="10"
                                                    class="form-control summernote @error('description') is-invalid @enderror"
                                                    required>{{ old('description') }}</textarea>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info ">Sumbit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
