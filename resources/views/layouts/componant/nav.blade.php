<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="header-info-left">
                            <ul>     
                                <li>
                                    <a href="tel:{{$site_setting?->country_code}}{{$site_setting?->number}}">
                                        {{$site_setting?->country_code}} &nbsp;{{$site_setting?->number}}
                                    </a>
                                </li>
                                <li class="text-lowercase">
                                    <a href="mailto:{{$site_setting?->email}}?subject=Inquiry%20From%20Website&body=Hello,">{{$site_setting?->email}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header-info-right">
                            <ul class="header-social">    
                                <li>
                                    <a class="text-decoration-none fs-5" target="_blank" href="{{$site_setting?->facebook}}">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-decoration-none fs-5" target="_blank" href="{{$site_setting?->instagram}}">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-decoration-none fs-5" target="_blank" href="{{$site_setting?->linkedin}}">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 p-0">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset(@$site_setting?->logo) ?? asset('front_assets/img/logo.png') }}" alt="Logo" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                          
                                            <li>
                                                <a href="{{ route('destination') }}">Study destination</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('universities') }}">universities</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('courses') }}">courses</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('scholarship') }}">scholarship</a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul> --}}
                                            </li>
                                            <li>
                                                <a href="{{ route('about') }}">about us</a>
                                            </li>
                                            <li>
                                                <a href="#contact">contact us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12 d-block d-lg-none">
                            <div class="mobile_menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>