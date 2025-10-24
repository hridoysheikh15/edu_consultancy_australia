@extends('admin.layouts.app')
@section('title', '| University Page Layout')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>University Page Layout</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">University Page Layout</li>
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
                <form action="{{ route('university.layout.update') }}" enctype="multipart/form-data" method="post"
                    class="form-horizontal">
                    @csrf
                    <div class="form-group mb-3 d-flex justify-content-between gap-2">
                        <div>
                            <label >Header Image</label>
                            <small>Image size should not be greater than 2 MB.</small>
                            <input class="form-control mb-3 image @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" >
                        </div>
                        <div class="preview-img">
                            <img src="{{ $pageLayout?->image ? asset($pageLayout?->image) : asset('front_assets/img/preview.webp') }}" alt="Preview" loading="lazy">
                        </div>
                    </div>

                    <div class="form-group mb-3 d-flex justify-content-between gap-2">
                        <div>
                            <label >Banner Image</label>
                            <small>Image size should not be greater than 2 MB.</small>
                            <input class="form-control mb-3 image @error('banner') is-invalid @enderror" type="file" id="banner" name="banner" accept="image/*" >
                        </div>
                        <div class="preview-img">
                            <img src="{{ $pageLayout?->banner ? asset($pageLayout?->banner) : asset('front_assets/img/preview.webp') }}" alt="Preview" loading="lazy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">University Header</label>
                        <input type="text" id="header" name="header_one"
                            value="{{ old('header', $pageLayout?->header_one) }}"
                            class="form-control @error('header') is-invalid @enderror">
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
                            <h5 class="fw-bold">Manage Logo</h5>
                        </div>
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link nav-padding  active" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">All Logo</a>
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
                                                    <th>URL</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($logos as $logo)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="text-center"><img class="table-img"
                                                            src="{{ asset($logo?->image) ?? asset('globalImage/placeholderImg.jpg') }}"
                                                            alt=""></td>
                                                        <td>
                                                            {{ $logo?->link }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center"
                                                            style="gap: 10px" >
                                                                <a href="{{ route('university.logo.edit', $logo?->id) }}"
                                                                    class="btn btn-outline-primary btn-sm">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form action="{{ route('university.logo.delete', $logo?->id) }}"
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
                                        <form action="{{ route('university.logo.store') }}" method="post"enctype="multipart/form-data"
                                           class="form-horizontal">
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
                                                <label >University Website Link</label>
                                                <input type="text" id="header" name="link"
                                                    value="{{ old('header') }}"
                                                    class="form-control @error('header') is-invalid @enderror">
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
