@extends('layouts.app')

@section('title', $site_setting?->site_name ? $site_setting->site_name . ' || Education Consultant' : 'Education Consultant')

@section('external_css')
    <style>
        .testimonial-area .slider img {
            padding: 16px;
            width: 100%;
            aspect-ratio: 3/4;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Customize Arrows */
        }

        .testimonial-area .slick-prev,
        .testimonial-area .slick-next {
            font-size: 20px;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 50%;
            z-index: 1000;
        }

        .testimonial-area .slick-prev:hover,
        .testimonial-area .slick-next:hover {
            background: rgba(0, 0, 0, 0.8);
            /* Customize Dots */
        }

        .testimonial-area .slick-dots li button:before {
            color: #007bff;
        }

        .testimonial-area .slick-prev:before,
        .testimonial-area .slick-next:before {
            line-height: inherit;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link.active {
            color: #363636;
        }

        .tab-content h2,
        .tab-content p {
            color: #fff;
        }

        .tab-content img {
            aspect-ratio: 9/6;
        }
    </style>

@endsection

@section('content')
    <div class="content">
        <!-- slider Area Start-->
        <div class="slider-area">
            <div class="slider-active">
                @foreach ($headerSliders as $slider)
                    <!-- Single Slider -->
                    <div class="single-slider slider-height d-flex align-items-center" data-animation="fadeInLeft"
                        data-delay=".1s"
                        style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.75), rgba(0,0,0,0.1)), url('{{ asset($slider?->image) }}')">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-md-8">
                                    <div class="hero__caption">
                                        <span data-animation="fadeInLeft" data-delay=".1s">{{ $slider?->title }}</span>
                                        <h1 data-animation="fadeInLeft" data-delay=".5s">{{ $slider?->header }}</h1>
                                        <p data-animation="fadeInLeft" data-delay=".9s">{{ $slider?->short_description }}
                                        </p>
                                        <!-- Hero-btn -->
                                        <div class="hero__btn" data-animation="fadeInLeft" data-delay="1.1s">
                                            <a href="javascript: void(0);" class="btn hero-btn" type="button"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- slider Area End-->
        <!--? Categories Area Start -->
        <div class="categories-area py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-70">
                            <span>{{ $planEducation?->title }}</span>
                            <h2>{{ $planEducation?->header }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <i class="ri-puzzle-line"></i>
                            </div>
                            <div class="cat-cap">
                                <h5>
                                    <a href="javascript: void(0);">{{ $planEducation?->card_header_one }}</a>
                                </h5>
                                <p>
                                    {!! $planEducation?->card_description_one !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <i class="ri-lightbulb-flash-line"></i>
                            </div>
                            <div class="cat-cap">
                                <h5>
                                    <a href="javascript: void(0);">{{ $planEducation?->card_header_two }}</a>
                                </h5>
                                <p>
                                    {!! $planEducation?->card_description_two !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <i class="ri-mobile-download-line"></i>
                            </div>
                            <div class="cat-cap">
                                <h5>
                                    <a href="javascript: void(0);">{{ $planEducation?->card_header_three }}</a>
                                </h5>
                                <p>
                                    {!! $planEducation?->card_description_three !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Area End -->
        <!--? About Area Start-->
        <div class="support-company-area pt-100 pb-100 section-bg fix"
            data-background="{{ asset('front_assets/img/gallery/section_bg02.jpg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="{{ $topService?->image ? asset($topService?->image) : asset('front_assets/img/gallery/about.png') }}"
                                alt="About" loading="lazy">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span class="text-dark">{{ $topService?->title }}</span>
                                <h2> {{ $topService?->header }} </h2>
                            </div>
                            <div class="support-caption">
                                <div class="pera-top">
                                    {!! $topService?->description !!}
                                </div>
                                {{-- <p class="mb-65">
                                    {{ $topService?->sub_description }}
                                </p> --}}
                                <a href="{{ route('about') }}" class="btn post-btn">More About Us</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- About Area End-->
        <!--? Testimonial Start -->
        @if (!empty($sliderImages?->where('type', 'Gallery')) && $sliderImages?->where('type', 'Gallery')->count())
            <div id="area" class="testimonial-area py-5"
                data-background="{{ asset('front_assets/img/gallery/section_bg04.jpg') }}">
                <div class="container ">
                    <div class="slider">
                        @foreach ($sliderImages?->where('type', 'Gallery') as $image)
                            <div>
                                <img src="{{ asset($image?->image) ?? asset('front_assets/img/preview.webp') }}"
                                    alt="Image 1" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
       
        <!-- Coun Down End -->
        <!-- Want To work -->
        {{-- <section id="course" class="wantToWork-area w-padding2 section-bg"
            data-background="{{ asset('front_assets/img/gallery/section_bg03.jpg') }}">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-9 col-md-8">
                        <div class="wantToWork-caption wantToWork-caption2">
                            <h2>Are you Searching<br> For a First-Class Consultant?</h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-4">
                        <a href="#" class="btn btn-black f-right" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Contact Us Quick</a>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Want To work End -->
        <!-- Team Start -->
        @if (!empty($sliderImages?->where('type', 'Ceartificate')) && $sliderImages?->where('type', 'Ceartificate')->count())
            <div class="team-area py-5">
                <div class="container">
                    <div class="row">
                        <div class="cl-xl-7 col-lg-8 col-md-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-70">
                                <span>Featured Partner Universities</span>
                                <h2>Universities Affiliates Certificate</h2>
                            </div>
                        </div>
                    </div>
                    <div class="slider2">
                        <!-- single Team -->
                        @foreach ($sliderImages?->where('type', 'Ceartificate') as $item)
                            <div class="slide-item p-2">
                                <div class="single-team mb-30">
                                    <div class="team-img">
                                        <img src="{{ asset($item?->image) ?? asset('globalImages/placeholder.png') }}"
                                            alt="team2" loading="lazy">
                                    </div>
                                    <div class="team-caption">
                                        <h3>
                                            <a href="javascript:void(0)">{{ $item?->header }}</a>
                                        </h3>
                                        <span>{{ $item?->title }} </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <!-- Team End --> 
        <!-- University Information tab start -->
        {{-- <div id="university" class="testimonial-area testimonial-padding"
            data-background="{{ asset('front_assets/img/gallery/section_bg04.jpg') }}">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($universitys as $key => $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if ($key == 0) active @endif"
                                id="tab-{{ $key }}" data-bs-toggle="tab"
                                data-bs-target="#tab-content-{{ $key }}" type="button" role="tab"
                                aria-controls="tab-content-{{ $key }}"
                                aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                {{ $item?->tab_name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content pt-4" id="myTabContent">
                    @foreach ($universitys as $key => $item)
                        <div class="tab-pane fade @if ($key == 0) show active @endif"
                            id="tab-content-{{ $key }}" role="tabpanel"
                            aria-labelledby="tab-{{ $key }}" tabindex="0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="{{ $item?->image ? asset($item?->image) : asset('globalImages/placeholder.png') }}"
                                        alt="uni" class="w-100 object-fit-cover" loading="lazy">
                                </div>
                                <div class="col-sm-8">
                                    <h2>{{ $item?->name }}</h2>
                                    <small class="text-warning">{{ $item?->address }}</small>
                                    <div class="d-sm-flex gap-4 mt-3">
                                        <p>
                                            <span class="d-block fs-2">
                                                <i class="ri-line-chart-line"></i> #{{ $item?->rank }}
                                            </span> In Rankings
                                        </p>
                                        <p>
                                            <span class="d-block fs-2">
                                                <i class="ri-graduation-cap-line"></i> #{{ $item?->graduate }}
                                            </span> Our Graduate
                                        </p>
                                    </div>
                                    <p>
                                        {{ $item?->desctiption }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
        <!-- University Information tab end -->
        <!-- Brand Area Start -->
        {{-- <div class="brand-area pb-140 pt-140">
            <div class="container">
                <div class="brand-active brand-border pb-40">
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand1.png') }}" alt="brand1">
                    </div>
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand2.png') }}" alt="brand2">
                    </div>
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand3.png') }}" alt="brand3">
                    </div>
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand4.png') }}" alt="brand3">
                    </div>
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand2.png') }}" alt="brand2">
                    </div>
                    <div class="single-brand">
                        <img src="{{ asset('front_assets/img/gallery/brand5.png') }}" alt="brand5">
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Brand Area End -->
        <!-- schollership area Start -->
        <div class="section section-cta bg-danger pt-5">
            <div class="container">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-8 col-lg-5 pt-6 pb-6 pt-lg-7 pb-lg-7">
                        <div class="content">
                            <h2 class="title mb-3 pr-5 pr-lg-0 text-white">
                                Don't Miss Out on <br>Scholarships
                            </h2>
                            <h6 class="s-md s-md-lg lh-md w-500 text-light">
                                Get your scholarship matching report and 1-on-1 advice from our education consultant.
                            </h6>
                            <div class="mt-5 pr-7">
                                <a href="#" class="btn bg-dark" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-6 align-self-end">
                        <img src="https://unienrol.com/frontend/v3/images/home/cta-girl.png" alt="Unienrol scholarship"
                            width="540" height="416" class="img" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        <!-- schollership area End -->
    </div>

    <!-- modal for take user info start -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fill this form for get in touch</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="startForm" method="post">
                        <div class="form-group mb-3">
                            <label for="name">Your Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="number">Phone Number:</label>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control numeric" name="code" id="code" placeholder="+60" style="max-width: 90px;">
                                <input type="text" class="form-control numeric" name="number" id="number">
                            </div>
                        </div>
                        
                        
                        <div class="form-group mb-3">
                            <label for="email">Your Email:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="program">Program Interested:</label>
                            <input type="text" class="form-control" name="program" id="program">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-custom">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal for take user info end -->
@endsection

@section('external_js')

    <script>
        $(document).ready(function() {
            $('.slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrows: true,
                autoplay: true,
                prevArrow: '<button type="button" class="slick-prev"></button>',
                nextArrow: '<button type="button" class="slick-next"></button>',
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 768, // Tablet
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480, // Mobile
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.slider2').slick({
                slidesToShow: 3,
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 1500,
                responsive: [{
                        breakpoint: 768, // Tablet
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480, // Mobile
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#nationality').select2({
                dropdownParent: $('#exampleModal'),
                width: '100%'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#startForm').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('contact_us.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showToast("Success", "Your form was submitted successfully.",
                            "success");
                        $('#startForm')[0].reset();
                        $('#exampleModal').modal('hide');

                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                showToast("Validation Error", value.join(', '), "error");
                            });
                        } else if (xhr.responseJSON && xhr.responseJSON.status == 422) {
                            showToast("Validation Error", xhr.responseJSON.message, "error");
                        } else {
                            showToast("Error", "Something went wrong. Please try again.", "error");
                        }
                    }



                });
            });
        });
    </script>



@endsection
