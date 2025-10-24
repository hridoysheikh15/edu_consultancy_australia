@extends('admin.layouts.app')
@section('title', '| Slider Image')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Slider Image</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Slider Image</li>
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
                            <h5 class="fw-bold">Slider Image</h5>
                        </div>
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link nav-padding  active" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">All Slider</a>
                                    <a class="nav-item nav-link nav-padding" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span
                                            class="ti-plus"></span> Create Section</a>
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
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Title</th>
                                                    <th class="text-center">Header</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($sliders as $slider)
                                                    <tr>
                                                        <td>{{ $sliders->firstItem() + $loop->index  }}</td>
                                                        <td class="text-center"><img class="table-img"
                                                                src="{{ asset($slider?->image) ?? asset('globalImage/placeholderImg.jpg') }}"
                                                                alt=""></td>
                                                        <td class="text-center">{{ $slider?->type }}</td>
                                                        <td class="text-center">{{ $slider?->title ?? "N/A" }}</td>
                                                        <td class="text-center">{{ $slider?->header ?? 'N/A'}}</td>
                                                        <td class="d-flex justify-content-center align-items-center"
                                                            style="gap: 10px">
                                                            <a href="{{ route('slider_image.edit', $slider?->id) }}"
                                                                class="btn btn-outline-primary btn-sm">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form action="{{ route('slider_image.delete', $slider?->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
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
                                    <div class="d-flex justify-content-end">
                                        {{$sliders?->links()}}
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                    <div class="mt-4">
                                        <form action="{{ route('slider_image.store') }}" method="post"
                                            enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="image">Image</label>
                                                <small>Image size should not be greater than 2 MB.</small>
                                                <input class="form-control mb-3 image @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" required>
                                                <div class="preview-img">
                                                    <img src="{{ asset('front_assets/img/preview.webp') }}" alt="Preview" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="type">Image Type</label>
                                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                                    <option selected disabled>Select Image Type</option>
                                                    <option {{request()->get('type') == 'Gallery' ? 'selected' : ''}} value="Gallery">Gallery Image</option>
                                                    <option {{request()->get('type') == 'Ceartificate' ? 'selected' : ''}} value="Ceartificate">Ceartificate</option>
                                                    {{-- <option {{request()->get('type') == 'University' ? 'selected' : ''}} value="University">University Logo</option> --}}
                                                </select>
                                            </div>

                                            <div class="form-group mb-3 d-none" id="title-div">
                                                <label for="title">Title <span class="text-danger">*</span> </label>
                                                <input type="text" name="title"  value="{{ old('title') }}" class="form-control  @error('title') is-invalid @enderror" >
                                            </div>

                                            <div class="form-group mb-3 d-none" id="header-div">
                                                <label for="header">Header <span class="text-danger">*</span></label>
                                                <input type="text" name="header" value="{{ old('header') }}" class="form-control  @error('header') is-invalid @enderror" >
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
