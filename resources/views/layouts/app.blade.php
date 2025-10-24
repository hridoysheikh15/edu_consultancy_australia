<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic Meta Tags -->
    <meta name="description"
        content="Looking to study in Malaysia? Get expert guidance on university admissions, student visas, scholarships, and career counseling from our top education consultancy.">
    <meta name="keywords"
        content="study in Malaysia, education consultancy Malaysia, Malaysian universities, student visa Malaysia, scholarships in Malaysia, international students, study abroad">
    <meta name="author" content="Study Abroad Consultancy">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook) -->
    <meta property="og:title" content="Study in Malaysia | Expert Education Consultancy Services">
    <meta property="og:description"
        content="Get expert guidance for studying in Malaysia, including university admissions, visas, scholarships, and career counseling.">
    <meta property="og:image" content="http://www.studyabroad.com.my/img/study-malaysia-banner.jpg">
    <meta property="og:url" content="http://www.studyabroad.com.my">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Study in Malaysia | Expert Education Consultancy Services">
    <meta name="twitter:description"
        content="Looking to study in Malaysia? Get professional guidance on admissions, visas, scholarships, and career counseling.">
    <meta name="twitter:image" content="http://www.studyabroad.com.my/img/study-malaysia-banner.jpg">

    <!-- Canonical Tag -->
    <link rel="canonical" href="http://www.studyabroad.com.my">

    <!-- Schema Markup (JSON-LD) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "EducationalOrganization",
            "name": "Study Abroad Consultancy",
            "url": "http://www.studyabroad.com.my",
            "logo": "http://www.studyabroad.com.my/img/logo.jpeg",
            "description": "Top education consultancy in Malaysia providing expert guidance on university admissions, student visas, and scholarships.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "123 Education Street",
                "addressLocality": "Kuala Lumpur",
                "addressRegion": "KL",
                "postalCode": "50000",
                "addressCountry": "Malaysia"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+60 12-345 6789",
                "contactType": "customer service"
            }
        }
        </script>

    <!-- fav icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset($site_setting?->favicon) }}">

    <!-- title -->
    <title>@yield('title', 'Study in Malaysia | Expert Education Consultancy Services')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front_assets/font/remixicon/remixicon.css') }}">

    <!-- slick carousel css -->
    <link rel="stylesheet" href="{{ asset('front_assets/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/slick/slick/slick-theme.css') }}">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/slicknav.css') }}">
    
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/animate.css') }}">

    <!-- Custom CSS Start -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">

    <!-- select 2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- toster css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/toaster.css') }}">

    <!-- Custom CSS End -->

    <!-- custom css start -->

    @yield('external_css')

    <!-- custom css end -->
    <!-- jquery CDN -->
    <script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        
        <!--? Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="{{ asset('front_assets/img/logo.png') }}" alt="Logo" loading="lazy">
                    </div>
                </div>
            </div>
        </div>

        <!--include navbar -->
        @include('layouts.componant.nav')

        <!-- main content start -->
        @yield('content')
        <!-- main content end -->
    </div>

    <!-- include Footer Area -->
    @include('layouts.componant.footer')

    <!-- bootstrap js -->
    <script src="{{ asset('front_assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- slick carousel js -->
    <script src="{{ asset('front_assets/slick/slick/slick.min.js') }}"></script>

    <!-- plugins js -->
    <script src="{{ asset('front_assets/js/animation.js') }}"></script>
    <script src="{{ asset('front_assets/js/magnific.js') }}"></script>
    <script src="{{ asset('front_assets/js/slick-nav.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('front_assets/js/index.js') }}"></script>

    <!-- select 2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- toster js -->
    <script src="{{ asset('backend/assets/js/toaster.js') }}"></script>
    <!-- toster alert -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast("Success", "{{ session('success') }}", "success");
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast("Error", "{{ session('error') }}", "error");
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast("Warning", "{{ session('warning') }}", "warning");
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast("Info", "{{ session('info') }}", "info");
            });
        </script>
    @endif

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast("error", "{{ $error }}", "error");
                });
            </script>
        @endforeach
    @endif

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <!-- custom js start -->
    @yield('external_js')
    <!-- custom js end -->

    <script>
        $(document).ready(function () {
            $('.numeric').on('input', function () {
                let cleaned = $(this).val().replace(/[^0-9+]/g, '');
                // Only allow + at the start
                if (cleaned.indexOf('+') > 0) {
                    cleaned = cleaned.replace(/\+/g, '');
                } else if (cleaned.indexOf('+') === 0) {
                    cleaned = '+' + cleaned.slice(1).replace(/\+/g, '');
                }
                $(this).val(cleaned);
            });
        });

    </script>
</body>

</html>
