@extends('layouts.app')

@section('title',
    $site_setting?->site_name
    ? $site_setting->site_name . ' || Education Consultant'
    : 'Education
    Consultant')

@section('external_css')
    <style>
        .content {
            background-color: #fff9e6;
        }

        .banner-box img {
            width: 100%;
            object-fit: cover;
            aspect-ratio: 3/1;
        }

        .banner-sm img {
            aspect-ratio: 5/1;
            border-radius: 12px;
        }
        
        .card {
            height: 100%;
            border: none;
            transition: 300ms all ease;
            box-shadow: 0px 2px 14px #1c294d11;
        }

        .card:hover {
            transition: 500ms all ease;
            box-shadow: 0px 4px 14px #1c294d33;
        }
        .rich-text p {
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <section class="quick-info">
            <!-- banner start -->
            <div class="banner-box position-relative">
                <img src="{{ asset($layout?->image) }}" alt="Banner" loading="lazy">
            </div>
            <!-- banner End -->   
        </section>
        <section class="container uni-list py-4 py-md-5">
            <h3 class="text-center text-uppercase mb-3">
                @php
                $words = explode(' ', $layout?->header_one);
                $count = count($words);

                if ($count >= 2) {
                    $words[$count - 2] = '<span style="color: #f19c22;">' . $words[$count - 2] . '</span>';
                }

                $header = implode(' ', $words);
            @endphp

            {!! $header !!}
            </h3> 
            @if($logos->count() > 0)   
            <div class="row justify-content-center">
                @foreach ($logos as $logo)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-2">
                    <a href="{{$logo?->link}}" target="_blank" class="card">
                        <div class="card-body">
                            <img class="img-fluid ratio ratio-1x1" src="{{asset($logo?->image)}}" alt="University Logo" loading="lazy">
                        </div>
                    </a>
                </div>
                @endforeach
            </div> 
            @endif
        </section>  
        <!-- another section adding -->
        <section class="quick-info pb-4 pb-md-5 container">
            <!-- banner start -->
            <div class="banner-box banner-sm mb-4">
                <img src="{{asset($layout?->banner)}}" alt="Banner" loading="lazy">
            </div> 
            <!-- banner End --> 
            <div class="section-tittle mb-3">
                <span class="h2 d-block m-0">{{ $layout?->header_two }}</span>
                <small>{{ $layout?->sub_title }}</small>
            </div>   
            <div class="row">
                @foreach($cards as $card)
                <div class="col-sm-6 col-md-4 p-2">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">
                                {{$card?->title}}
                            </h6>
                            <div class="rich-text">
                                {!! $card?->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
