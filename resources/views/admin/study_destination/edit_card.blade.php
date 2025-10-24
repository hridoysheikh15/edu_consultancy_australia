@extends('admin.layouts.app')
@section('title', '| Edit Destination Card')
@push('css')
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit Destination Card'</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                                <li><a href="{{route('study_destination.card')}}">Destination Card'</a></li>
                                <li class="active">Edit Destination Card</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <h5 class="fw-bold">Edit Destination Card</h5>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('study_destination.card.update',$card?->id) }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="row form-group mb-3">
                                    <div class="col-sm-12 col-md-2">
                                        <label for="header" class=" form-control-label">Header</label>
                                    </div>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" id="header" name="header"
                                            value="{{ $card?->header }}"
                                            class="form-control @error('header') is-invalid @enderror"
                                            required>
                                    </div>
                                </div>
                                <div class="row form-group mb-3">
                                    <div class="col-sm-12 col-md-2">
                                        <label for="description"
                                            class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="description" id="description" rows="4"
                                            class="form-control summernote @error('description') is-invalid @enderror" required>{{ $card?->description }}</textarea>
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
