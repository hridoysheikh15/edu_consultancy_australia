@extends('admin.layouts.app')
@section('title', '| Edit card')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit card</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('university.card') }}">Card</a></li>
                                <li class="active">Edit card</li>
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
                            <h5 class="fw-bold">Edit card</h5>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('university.card.update', $card?->id) }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group mb-3" id="title-div">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"  value="{{ $card?->title }}" class="form-control  @error('title') is-invalid @enderror">
                                </div>

                                <div class="form-group mb-3" id="header-div">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="summernote" id="description">{{ $card?->description }}</textarea>
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

