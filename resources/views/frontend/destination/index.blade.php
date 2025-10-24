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
            right: 60px;
            padding: 3rem;
            max-width: 750px;
            position: absolute;
            transform: translateY(-50%);
            background-color: #36363699;
        }

        .left-data {
            left: 60px;
            right: auto;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        @if($pageLayout?->section_one_image || $pageLayout?->section_one_header || $pageLayout?->section_one_description)
        <section class="quick-info pb-4 pb-md-5">
            <!-- banner start -->
            <div class="banner-box position-relative">
                @if($pageLayout?->section_one_image)
                <img src="{{ asset($pageLayout?->section_one_image) }}" alt="Banner" loading="lazy">
                @endif
                <div class="banner-content left-data">
                    @if($pageLayout?->section_one_header)
                    <h2 class="text-white">{{ $pageLayout?->section_one_header }}</h2>
                    @endif
                    @if($pageLayout?->section_one_description)
                    <div class="text-white text-justify">
                        {!! $pageLayout?->section_one_description !!}
                    </div>
                    @endif
                </div>
            </div>
            <!-- banner End -->
        </section>
        @endif
        <!-- content start -->
        @if($pageLayout?->section_two_header || $pageLayout?->section_two_description)
            <section class="study-destination-content">
                @if($pageLayout?->section_two_header)
                <center class="py-4">
                    <h4>{{$pageLayout?->section_two_header}}</h4>
                </center>
                @endif
                @if($pageLayout?->section_two_description)
                <div class="destination-description container">
                    {!! $pageLayout?->section_two_description !!}
                </div>
                @endif
            </section>
            <!-- content end -->
        @endif

        <!-- another section start -->
        @if($pageLayout?->section_three_header || $pageLayout?->section_three_description || $pageLayout?->section_three_image)
        <section class="pb-4 pb-md-5">
            <!-- banner start -->
            <div class="banner-box position-relative">
                @if($pageLayout?->section_three_image)
                <img src="{{ asset($pageLayout?->section_three_image) }}" alt="Banner" loading="lazy">
                @endif

                @if($pageLayout?->section_three_header || $pageLayout?->section_three_description)
                <div class="banner-content">
                    @if($pageLayout?->section_three_header)
                    <h2 class="text-white">{{ $pageLayout?->section_three_header }}</h2>
                    @endif
                    @if($pageLayout?->section_three_description)
                    <div class="text-white text-justify">
                        {!! $pageLayout?->section_three_description !!}
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <!-- banner End -->
        @endif
            <!-- content start -->
            @if($cards->count() > 0)
            <section class="study-destination-content">
                <center class="py-4">
                    <h4>{{ $pageLayout?->section_four_header }}</h4>
                </center>
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach ($cards as $card)
                        <div class="col-sm-6 col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4>{{ $card->header }}</h4>
                                    <div>
                                        {!! $card->description !!}
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            <!-- content end -->
        </section>
    </div>
@endsection
