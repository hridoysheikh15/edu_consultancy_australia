@extends('layouts.app')

@section('title',
    $site_setting?->site_name
    ? $site_setting->site_name . ' || Education Consultant'
    : 'Education
    Consultant')

@section('external_css')
    <style>
        .banner-box img {
            width: 100%;
            object-fit: cover;
            aspect-ratio: 3/1;
        }

        .banner-content {
            top: 50%;
            left: 60px;
            padding: 3rem;
            max-width: 750px;
            position: absolute;
            transform: translateY(-50%);
            background-color: #36363699;
        } 
    </style>
@endsection

@section('content')
    <div class="content">
        <section class="quick-info pb-4 pb-md-5">
            <!-- banner start -->
            <div class="banner-box position-relative">
                <img src="{{ asset($pageLayout?->image) }}" alt="Banner" loading="lazy">
                {{-- <div class="banner-content">
                    <h2 class="text-white">{{ $pageLayout?->header_one }}</h2>
                    <p class="text-white text-justify m-0">
                        {{ $pageLayout?->description_one }}
                    </p>
                </div> --}}
            </div>
            <!-- banner End -->
            <!-- content start -->
            <section class="study-destination-content">
                <center class="py-4">
                    <h4>{{ $pageLayout?->header_two }}</h4>
                </center>
                <div class="destination-description container">
                    {!! $pageLayout?->description_two !!}
                </div>
            </section>
            <!-- content end -->
        </section>        
    </div>
@endsection
