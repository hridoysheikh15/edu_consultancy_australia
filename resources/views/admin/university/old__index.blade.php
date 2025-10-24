@extends('admin.layouts.app')
@section('title', '| University')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>University</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">University</li>
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
                            <h5 class="fw-bold">University</h5>
                        </div>
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link nav-padding  active" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">All University</a>
                                    <a class="nav-item nav-link nav-padding" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span
                                            class="ti-plus"></span> Create University</a>
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
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Address</th>
                                                    <th class="text-center">Tab Name</th>
                                                    <th class="text-center">Rank</th>
                                                    <th class="text-center">Graduate</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($universities as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration  }}</td>
                                                        <td class="text-center"><img class="table-img"
                                                                src="{{ asset($item?->image) ?? asset('globalImage/placeholderImg.jpg') }}"
                                                                alt=""></td>
                                                        <td class="text-center">{{ $item?->name }}</td>
                                                        <td class="text-center">{{ $item?->address }}</td>
                                                        <td class="text-center">{{ $item?->tab_name}}</td>
                                                        <td class="text-center">{{ $item?->rank}}</td>
                                                        <td class="text-center">{{ $item?->graduate}}</td>
                                                        <td class="text-center">{{ $item?->desctiption}}</td>
                                                        <td class="d-flex justify-content-center align-items-center"
                                                            style="gap: 10px">
                                                            <a href="{{ route('university.edit', $item?->id) }}"
                                                                class="btn btn-outline-primary btn-sm">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form action="{{ route('university.delete', $item?->id) }}"
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
                                </div>
                                <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                    <div class="mt-4">
                                        <form action="{{ route('university.store') }}" method="post"
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
                                                <label for="tab_name">Tab Name </label>
                                                <input type="text" name="tab_name" id="tab_name" value="{{ old('tab_name') }}" class="form-control  @error('tab_name') is-invalid @enderror" required>
                                            </div>

                                            <div class="form-group mb-3" >
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" required>
                                            </div>

                                            <div class="form-group mb-3" >
                                                <label for="address">Address</label>
                                                <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control  @error('address') is-invalid @enderror" required>
                                            </div>
                                            
                                            <div class="form-group mb-3" >
                                                <label for="rank">Rank</label>
                                                <input type="number" name="rank" id="rank" value="{{ old('rank') }}" class="form-control  @error('rank') is-invalid @enderror" required>
                                            </div>
                                            
                                            <div class="form-group mb-3" >
                                                <label for="graduate">Graduate</label>
                                                <input type="number" name="graduate" id="graduate" value="{{ old('graduate') }}" class="form-control  @error('graduate') is-invalid @enderror" required>
                                            </div>

                                            <div class="form-group mb-3" >
                                                <label for="description">Description <span class="text-danger">*</span></label>
                                                <textarea name="description" id="description" rows="4" cols="100" class="form-control  @error('description') is-invalid @enderror">{{old('description')}}</textarea>
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
