<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Study Abroad Consultancy - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset($site_setting?->favicon)}}">
    <link rel="shortcut icon" href="{{asset($site_setting?->favicon)}}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/font_awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/themify/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/pixeden/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/flag_icon/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/cdn_css/fullcalendar.min.css') }}">

    <!-- toster css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/toaster.css') }}">

    <!-- select 2 js -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

    <!-- select 2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

    <style>
        /* for tab padding */
        .nav-padding {
            padding: 10px 15px !important;
        }

        /* for auto * required when input required */
        label.required-label:after {
            content: "*";
            color: red;
            margin-left: 3px;
        }

        /* select2  border color*/
        .select2-container--default .select2-selection--single {
            border: 1px solid #dee2e6
        }

        .table-img {
            width: 50px;
            height: auto;
        }

        .content-img {
            width: 60px;
            height: auto;
        }
        
        .preview-img img {
            width: 150px;
            padding: 8px;
            object-fit: cover;
            aspect-ratio: 5/3;
            border: 2px double #f7ad36;
        }

        .footer-tittle p {
            color: #fff !important;
        }

    </style>
    @stack('css')
</head>

<body class="@if (!Auth::check()) bg-dark @endif">
    <!-- Right Panel -->
    @auth
        <!-- Include Sidebar -->
        @include('admin.layouts.partials.sidebar')
        <div id="right-panel" class="right-panel">
            <!-- Include header -->
            @include('admin.layouts.partials.header')

            <!-- Content -->
            @yield('content')

            <div class="clearfix"></div>

            <!-- Include Footer -->
            @include('admin.layouts.partials.footer')
        </div>
    @endauth

    @guest
        <!-- Only Content for Login Page -->
        @yield('content')
    @endguest

    <!-- bootstrap js -->
    <script src="{{ asset('backend/assets/js/cdn_js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/cdn_js/bootstrap.min.js') }}"></script>

    <!--  Chart js -->
    <script src="{{ asset('backend/assets/js/cdn_js/Chart.bundle.min.js') }}"></script>

    <!--Chartist Chart-->
    <script src="{{ asset('backend/assets/js/cdn_js/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/cdn_js/chartist-plugin-legend.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/cdn_js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/cdn_js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/init/fullcalendar-init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/cdn_js/sweetalert2@11.js') }}"></script>

    <!-- select 2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- toster js -->
    <script src="{{ asset('backend/assets/js/toaster.js') }}"></script>

    <!-- summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <!-- main js -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(
                "input[required], select[required], textarea[required], input[type='checkbox'][required], input[type='radio'][required]"
            ).each(function() {
                var $label = $('label[for="' + $(this).attr("id") + '"]');

                $label.addClass("required-label");
            });
        });
    </script>

    <!-- delete confirm -->
    <script type="text/javascript">
        $('.delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Do it!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {

                        form.submit();

                    }
                });
        });
    </script>

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

    <!-- summernote js -->
    <script>
        $('.summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'forecolor']],  // Added 'forecolor' for font color
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    
    

    <script>
        $(".image").on("change", function(event) {
            var input = $(this);
            var output = input.closest(".form-group").find(".preview-img img");

            if (event.target.files.length > 0) {
                var file = event.target.files[0];
                var objectURL = URL.createObjectURL(file);
                output.attr("src", objectURL).on("load", function() {
                    URL.revokeObjectURL(objectURL);
                });
            }
        });
    </script>


    @stack('js')
</body>

</html>
