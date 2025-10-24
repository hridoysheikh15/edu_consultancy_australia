@extends('admin.layouts.app')
@section('title', '| Edit University')
@push('css')
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit University</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('university.index') }}">University</a></li>
                                <li class="active">Edit University</li>
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
                            <h5 class="fw-bold">Edit University</h5>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('university.update',$data?->id) }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="image">Image</label>
                                    <small>Image size should not be greater than 2 MB.</small>
                                    <input class="form-control mb-3 image @error('image') is-invalid @enderror"
                                        type="file" id="image" name="image" accept="image/*" >
                                    <div class="preview-img">
                                        <img src="{{ $data?->image ? asset($data?->image) : asset('front_assets/img/preview.webp') }}" alt="Preview"
                                            loading="lazy">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tab_name">Tab Name </label>
                                    <input type="text" name="tab_name" id="tab_name" value="{{ $data?->tab_name }}"
                                        class="form-control  @error('tab_name') is-invalid @enderror" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ $data?->name }}"
                                        class="form-control  @error('name') is-invalid @enderror" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" value="{{ $data?->address }}"
                                        class="form-control  @error('address') is-invalid @enderror" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rank">Rank</label>
                                    <input type="number" name="rank" id="rank" value="{{ $data?->rank }}"
                                        class="form-control  @error('rank') is-invalid @enderror" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="graduate">Graduate</label>
                                    <input type="number" name="graduate" id="graduate" value="{{ $data?->graduate }}"
                                        class="form-control  @error('graduate') is-invalid @enderror" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" rows="4" cols="100" 
                                        class="form-control  @error('description') is-invalid @enderror">{{ $data?->desctiption }}</textarea>
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
                if ($(this).val() == 'Certificate') {
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
