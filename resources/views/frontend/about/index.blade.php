@extends('layouts.app')

@section('title', $site_setting?->site_name ? $site_setting->site_name . ' || Education Consultant' : 'Education Consultant')

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

        .services-img img {
            width: 100%;
            aspect-ratio: 3/2;
        } 

        .white-text {
            color: #fff
        }

        /* @media (max-width: 1023px) { */
            .banner-content {
                max-width: 100%;
                color: #363636 !important;
                position: static;
                text-align: center;
                transform: translateY(0%);
                background-color: transparent;
            }

            .white-text {
                color: #363636;
            }
        /* } */
    </style>
@endsection

@section('content')
    <div class="content">
        <section class="quick-info pb-4 pb-md-5">
            <!-- banner start -->
            <div class="banner-box position-relative">
                <img src="{{ asset($pageLayout?->image) }}" alt="Banner" loading="lazy">
                <div class="banner-content">
                    <h2 class="white-text">{{$pageLayout?->header_one}}</h2>
                    <div class="white-text text-justify">
                        {!! $pageLayout?->description_one !!}
                    </div>
                </div>
            </div>
            <!-- banner End -->
            <!-- content start -->
            <section class="study-destination-content">
                <center class="py-4">
                    <h4> {{ $pageLayout?->header_two }} </h4>
                </center>
                <div class="destination-description container">
                    {!! $pageLayout?->description_two !!}
                </div>
            </section>
            <!-- content end -->
        </section>  
        <!--? Services Ara Start -->
        <div class="services-area py-5">
            <div class="container">
                <div class="row">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-70">
                            <span>{{ $pageLayout?->card_title }}</span>
                            <h2>{{ $pageLayout?->card_header }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($cards as $card)
                        <div class="col-lg-6 col-md-6 col-sm-10">
                            <div class="single-services mb-100">
                                <div class="services-img">
                                    <img src="{{ $card?->image ? asset($card?->image) : asset('front_assets/img/gallery/services1.png') }}"
                                        alt="services1" loading="lazy">
                                </div>
                                <div class="services-caption">
                                    <span>{{ $card?->header }}</span>
                                    <div class="text-justify">
                                        {!! $card?->description !!}
                                    </div>
                                </div>
                                {{-- <div class="services-caption">
                                    <span>{{ $card?->header }}</span>
                                    <div class="text-justify">
                                        {!! $card?->description !!}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Services Ara End -->
    </div>
@endsection
