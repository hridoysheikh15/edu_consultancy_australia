@extends('admin.layouts.app')
@section('title', '| Edit Header Slider')
@push('css')
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit Header Slider</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                                <li><a href="{{route('slider.index')}}">Header Slider</a></li>
                                <li class="active">Edit Header Slider</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <h5 class="fw-bold">Edit Header Slider</h5>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('slider.update',$slider?->id) }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="row form-group mb-3">
                                    <div class="col col-md-2">
                                        <label for="name" class="form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-6 row gap-2">
                                        <div class="col-8">
                                            <input type="file" id="image" name="image"
                                                class="form-control form-control-sm image mb-3 @error('image') is-invalid @enderror">
                                                <div class="preview-img">
                                                    <img src="{{asset($slider?->image) ?? asset('front_assets/img/preview.webp') }}" alt="Preview" loading="lazy">
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col col-md-2">
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" id="title" name="title"
                                            value="{{ $slider?->title }}"
                                            class="form-control @error('title') is-invalid @enderror" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-3">
                                    <div class="col col-md-2">
                                        <label for="header" class=" form-control-label">Header</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" id="header" name="header"
                                            value="{{ $slider?->header }}"
                                            class="form-control @error('header') is-invalid @enderror"
                                            required>
                                    </div>
                                </div>
                                <div class="row form-group mb-3">
                                    <div class="col col-md-2">
                                        <label for="description"
                                            class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <textarea name="description" id="description" rows="4"
                                            class="form-control @error('description') is-invalid @enderror" required>{{ $slider?->short_description }}</textarea>
                                    </div>
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
@endsection

@push('js')

@endpush
