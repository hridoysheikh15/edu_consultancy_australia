@extends('admin.layouts.app')
@section('title', '| Scholarship')
@push('css')
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Scholarship</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Scholarship</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <!--  Top section (S1) -->
        <div class="card">
            <div class="card-body">
                <div class="pb-3">
                    <h4 class="fw-bold"><strong>Top section (S1)</strong></h4>
                </div>

                <form action="{{ route('scholarship.section_one.update') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="file" name="section_one_image" id="image"
                                    class="form-control image @error('image') is-invalid @enderror ">
                            </div>
                            <div class="preview-img">
                                <img src="{{ $pageLayout?->image ? asset($pageLayout?->image) : asset('front_assets/img/preview.webp') }}" alt="Preview"
                                    loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="section_one_header" id="header" value="{{ $pageLayout?->header_one }}"
                            class="form-control @error('header') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label><br>
                        <textarea class="summernote-block form-control" id="description" name="section_one_description">{{ $pageLayout?->description_one }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!--mid section (S2) -->
        <div class="card">
            <div class="card-body">
                <div class="pb-3">
                    <h4 class="fw-bold"><strong>Mid section (S2)</strong></h4>
                </div>

                <form action="{{ route('scholarship.section_two.update') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="section_two_header" id="header" value="{{ $pageLayout?->header_two }}"
                            class="form-control @error('header') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label><br>
                        <textarea class="summernote" id="description" name="section_two_description">{{ $pageLayout?->description_two }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('js')
@endpush
