@extends('admin.layouts.app')
@section('title', '| Edit Course')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit Course</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('course.index') }}">Course</a></li>
                                <li class="active">Edit Course</li>
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
                            <h5 class="fw-bold">Edit Course</h5>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('course.update', $course?->id) }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="image">Logo</label>
                                    <small>Image size should not be greater than 2 MB.</small>
                                    <input class="form-control image mb-3 @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" accept="image/*">
                                    <div class="preview-img">
                                        <img src="{{ asset($course?->image) ?? asset('front_assets/img/preview.webp') }}" alt="Preview"
                                            loading="lazy">
                                    </div>
                                </div>
                                <div class="form-group mb-3" id="title-div">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"  value="{{ $course?->name }}" class="form-control  @error('name') is-invalid @enderror">
                                </div>

                                <div class="form-group mb-3" id="title-div">
                                    <label for="descr">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control summernote @error('description') is-invalid @enderror"
                                    required>{{ $course?->description }}</textarea>
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
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() == 'Ceartificate') {
                    $('#title-div').removeClass('d-none');
                    $('#header-div').removeClass('d-none');
                } else {
                    $('#title-div').addClass('d-none');
                    $('#header-div').addClass('d-none');
                }
            })
        })
    </script>
@endpush

