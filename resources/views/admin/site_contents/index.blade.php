@extends('admin.layouts.app')
@section('title', '| Site Contents')
@push('css')
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Site Contents</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Site Contents</li>
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
                <div class="pb-3">
                    <h4 class="fw-bold"><strong>Plan Your Higher Eduction Section (S2)</strong></h4>
                </div>

                <form action="{{ route('site_contents.updateSectionTwo') }}" method="post">@csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $s2_data?->title }}"
                            class="form-control @error('title') is-invalid @enderror " required>
                    </div>

                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="header" id="header" value="{{ $s2_data?->header }}"
                            class="form-control @error('header') is-invalid @enderror " required>
                    </div>

                    <div class="row p-3">
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_1_header">Card-1 Header</label>
                                    <input type="text" name="card_1_header" id="card_1_header"
                                        value="{{ $s2_data?->card_header_one }}"
                                        class="form-control @error('card_1_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_1_description">Card-1 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea class="summernote" id="card_1_description" name="card_1_description">{{ $s2_data?->card_description_one }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_2_header">Card-2 Header</label>
                                    <input type="text" name="card_2_header" id="card_2_header"
                                        value="{{ $s2_data?->card_header_two }}"
                                        class="form-control @error('card_2_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_2_description">Card-2 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea class="summernote" id="card_2_description" name="card_2_description">{{ $s2_data?->card_description_two }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_3_header">Card-3 Header</label>
                                    <input type="text" name="card_3_header" id="card_3_header"
                                        value="{{ $s2_data?->card_header_three }}"
                                        class="form-control @error('card_3_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_3_description">Card-3 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea class="summernote" id="card_3_description" name="card_3_description">{{ $s2_data?->card_description_three }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Our Top Services (S3) -->
        <div class="card">
            <div class="card-body">
                <div class="pb-3">
                    <h4 class="fw-bold"><strong>Plan Your Higher EducOur Top Services (S3)</strong></h4>
                </div>

                <form action="{{ route('site_contents.updateSectionThree') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror ">
                            </div>
                            <div class="col-2">
                                <img src="{{ $s3_data?->image ? asset($s3_data?->image) : asset('globalImage/placeholderImg.jpg') }}"
                                    class="content-img" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $s3_data?->title }}"
                            class="form-control @error('title') is-invalid @enderror " required>
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="header" id="header" value="{{ $s3_data?->header }}"
                            class="form-control @error('header') is-invalid @enderror " required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label><br>
                        <textarea class="summernote" id="description" name="description">{{$s3_data?->description}}</textarea>
                       
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Why Us (S4) -->
        {{-- <div class="card">
            <div class="card-body">
                <div class="pb-3">
                    <h4 class="fw-bold"><strong>Why students prefer us (S4)</strong></h4>
                </div>

                <form action="{{ route('site_contents.updateSectionFour') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $s4_data?->title }}"
                            class="form-control @error('title') is-invalid @enderror " required>
                    </div>

                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="header" id="header" value="{{ $s4_data?->header }}"
                            class="form-control @error('header') is-invalid @enderror " required>
                    </div>

                    <div class="row p-3">
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_1_header">Card-1 Image</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="file" name="card_1_image" id="image"
                                                class="form-control @error('card_1_image') is-invalid @enderror ">
                                        </div>
                                        <div class="col-2">
                                            <img src="{{ $s4_data?->card_image_one ? asset($s4_data?->card_image_one) : asset('globalImage/placeholderImg.jpg') }}"
                                                class="content-img" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="card_1_header">Card-1 Header</label>
                                    <input type="text" name="card_1_header" id="card_1_header"
                                        value="{{ $s4_data?->card_header_one }}"
                                        class="form-control @error('card_1_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_1_description">Card-1 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea cols="100" class="p-2" rows="4" id="card_1_description" name="card_1_description">{{ $s4_data?->card_description_one }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_1_header">Card-2 Image</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="file" name="card_2_image" id="image"
                                                class="form-control @error('card_2_image') is-invalid @enderror ">
                                        </div>
                                        <div class="col-2">
                                            <img src="{{ $s4_data?->card_image_two ? asset($s4_data?->card_image_two) : asset('globalImage/placeholderImg.jpg') }}"
                                                class="content-img" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="card_2_header">Card-2 Header</label>
                                    <input type="text" name="card_2_header" id="card_2_header"
                                        value="{{ $s4_data?->card_header_two }}"
                                        class="form-control @error('card_2_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_2_description">Card-2 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea cols="100" class="p-2" rows="4" id="card_2_description" name="card_2_description">{{ $s4_data?->card_description_two }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_1_header">Card-3 Image</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="file" name="card_3_image" id="image"
                                                class="form-control @error('card_3_image') is-invalid @enderror ">
                                        </div>
                                        <div class="col-2">
                                            <img src="{{ $s4_data?->card_image_three ? asset($s4_data?->card_image_three) : asset('globalImage/placeholderImg.jpg') }}"
                                                class="content-img" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="card_3_header">Card-3 Header</label>
                                    <input type="text" name="card_3_header" id="card_3_header"
                                        value="{{ $s4_data?->card_header_three }}"
                                        class="form-control @error('card_3_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_3_description">Card-3 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea cols="100" class="p-2" rows="4" id="card_3_description" name="card_3_description">{{ $s4_data?->card_description_three }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="card_1_header">Card-4 Image</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="file" name="card_4_image" id="image"
                                                class="form-control @error('card_4_image') is-invalid @enderror ">
                                        </div>
                                        <div class="col-2">
                                            <img src="{{ $s4_data?->card_image_four ? asset($s4_data?->card_image_four) : asset('globalImage/placeholderImg.jpg') }}"
                                                class="content-img" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="card_3_header">Card-4 Header</label>
                                    <input type="text" name="card_4_header" id="card_4_header"
                                        value="{{ $s4_data?->card_header_four }}"
                                        class="form-control @error('card_4_header') is-invalid @enderror" required>
                                </div>

                                <div class="form-group">
                                    <label for="card_3_description">Card-4 Description<span
                                            class="text-danger">*</span></label>
                                    <textarea cols="100" class="p-2" rows="4" id="card_4_description" name="card_4_description">{{ $s4_data?->card_description_four }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div> --}}

    </div>
@endsection

@push('js')
@endpush
