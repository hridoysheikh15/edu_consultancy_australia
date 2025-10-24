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

        .rt-shape {
            bottom: 75%;
            left: 85%;
            width: 225px;
            rotate: 28deg;
            min-width: 200px;
            position: absolute;
        }

        .card {
            height: 100%;
            border: none;
            cursor: pointer;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 34px #1c294d11;
        }

        .card:hover {
            margin-top: -4px;
            transition: all 0.5s ease;
            box-shadow: 0px 4px 34px #1c294d22;
        }

        .card-description {
            display: none;
        }

        /* .card-description {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                width: 100%;
                height: 100%;
                padding: 15px;
                overflow: auto;
                background: #fff3e2;
                transition: all 0.3s ease;
                transform: rotateX(90deg);
                transform-origin: top center;
            } */

        /* .card-description::-webkit-scrollbar {
                display: none;
            } */

        /* .card-description::-webkit-scrollbar-thumb {
                display: none;
            } */

        /* .card:hover .card-description {
                transform: rotateX(0deg);
                opacity: 1;
            } */

        /* .card:hover .card-body {
                transform: rotateX(0deg);
                transition: 300ms all ease;
            } */

        /* .card:hover .card-body {
                transform: rotateX(-90deg);
                transition: 300ms all ease;
                opacity: 0;
            } */

        /* .card-body {
                transition: all 0.3s ease;
            } */

        /* .card-description>* {
                margin: 0;
            } */

        .bottom-section {
            margin-top: -300px;
            padding-block: 180px;
            background-size: cover;
            background-color: #f19b20;
            background-repeat: no-repeat;
            background-image: url("{{ asset('front_assets/img/group 2.png') }}");
        }

        .btn {
            border-radius: 4px;
        }

        .btn::before {
            background-color: #f19b20;
        }
    </style>
@endsection

@section('content')
    <div class="content position-relative overflow-hidden">
        <img class="rt-shape" src="{{ asset('front_assets/img/Group 1.png') }}" alt="Group 1" loading="lazy">
        <section class="container py-4 py-md-5">
            <div class="section-tittle mb-3">
                <span class="h2 d-block m-0">{{ $layout?->course_header }}</span>
                <small>{{ $layout?->course_sub_title }}</small>
            </div>
            <div class="row justify-content-center">
                @foreach ($courses as $course)
                    <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                        <div class="card">
                            <div class="card-body text-center modal-view">
                                <h1>
                                    <img class="w-50 ratio ratio-1x1" src="{{ asset($course?->image) }}" alt="Icon Course"
                                        loading="lazy">
                                </h1>
                                <h5 class="m-0">{{ $course?->name }}</h5>
                            </div>
                            <div class="card-description">
                                <h5>{{ $course?->name }}</h5>
                                <div class="rich-description">
                                    {!! $course?->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <div class="bottom-section">
    </div>

    <!-- detailed modal -->
    <div class="modal fade" tabindex="-1" id="detailed-modal">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamic-header">Course Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="dynamic-detail">Loading...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-3 py-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('external_js')
    <script>
        $('.modal-view').on('click', function(e) {
            let parent = $(this).next('.card-description');
            let header = parent.find('h5').text();
            let detail = parent.find('.rich-description').html();

            $('#dynamic-header').text(header);
            $('#dynamic-detail').html(detail);

            $('#detailed-modal').modal('show');
        });
    </script>
@endsection
