@extends('admin.layouts.app')
@section('title', '| Site Setting')
@push('css')
@endpush
<style>
    .select2-container--default .select2-selection--single {
        height: 38px !important;
        padding-top: 5px !important;
    }

    /* .note-editing-area {
        background: #6764cc;
    } */
</style>
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Site Setting</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Site Setting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Plan Your Higher Eduction Section (S2) -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('site_setting.update') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group mb-3 col-6">
                            <label for="image">Site Logo</label>
                            <small>Image size should not be greater than 2 MB.</small>
                            <input class="form-control mb-3 image" type="file" id="image" name="logo"
                                accept="image/*">
                            <div class="preview-img">
                                <img src="{{ $site_data?->logo ? asset($site_data?->logo) : asset('front_assets/img/preview.webp') }}"
                                    alt="Preview" loading="lazy">
                            </div>
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="image">Favicon</label>
                            <small>Image size should not be greater than 2 MB.</small>
                            <input class="form-control mb-3 image " type="file" id="image" name="favicon"
                                accept="image/*">
                            <div class="preview-img">
                                <img src="{{ $site_data?->favicon ? asset($site_data?->favicon) : asset('front_assets/img/preview.webp') }}"
                                    alt="Preview" loading="lazy">
                            </div>
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="code">Code</label>
                            @include('admin.site_setting.include.country_code')
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                value="{{ $site_data?->number }}" placeholder="Phone">
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $site_data?->email }}" placeholder="Email">
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="image">Address</label>
                            <textarea name="address" class="form-control summernote" cols="50" rows="4" id="">{{ $site_data?->address }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="facebook">Site Name</label>
                            <input type="text" class="form-control" name="site_name" id="site_name"
                                value="{{ $site_data?->site_name }}" placeholder="Site Name">
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook"
                                value="{{ $site_data?->facebook }}" placeholder="Facebook">
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="instagram"
                                value="{{ $site_data?->instagram }}" placeholder="Instagram">
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="whatsapp">Whatsapp (number with code)</label>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                value="{{ $site_data?->whatsapp }}" placeholder="whatsapp">
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin"
                                value="{{ $site_data?->linkedin }}" placeholder="Linkedin">
                        </div>
                        
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
