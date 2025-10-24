<!-- Left Panel -->
@php
    $contactCount = \App\Models\ContactUs::where('is_read', 0)->count();
@endphp
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('dashboard')? 'active': '' }}">
                    <a href="{{route('dashboard')}}"><i class="menu-icon ti-layout"></i>Dashboard </a>
                </li>

                <li class="menu-title">Home Section</li>
                <li class="{{ Route::is('contact_us.request')? 'active': '' }}">
                    <a href="{{ route('contact_us.request') }}">
                        <i class="menu-icon ti-signal"></i>
                        Contact Requests
                        @if($contactCount > 0)
                            <span class="badge badge-primary">{{ $contactCount }}</span>
                        @endif
                    </a>
                </li>
                

                <li class="{{ Route::is('slider.index')? 'active': '' }}">
                    <a href="{{route('slider.index')}}"><i class="menu-icon ti-layout-slider"></i>Header Slider</a>
                </li>

                <li class="{{ Route::is('site_contents.index')? 'active': '' }}">
                    <a href="{{route('site_contents.index')}}"><i class="menu-icon ti-notepad"></i>Site Contents</a>
                </li>

                <li class="{{ Route::is('slider_image.index')? 'active': '' }}">
                    <a href="{{route('slider_image.index')}}"><i class="menu-icon ti-image"></i>Slider Image</a>
                </li>

                {{-- <li class="{{ Route::is('university.index')? 'active': '' }}">
                    <a href="{{route('university.index')}}"><i class="menu-icon ti-map"></i>University</a>
                </li> --}}
                <li class="menu-title">Extra Pages</li>
                <li class="menu-item-has-children dropdown @if(Route::is('study_destination.*')) show active @endif">
                    <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{Route::is('study_destination.*') ? 'true' : 'false'}}"> 
                    <i class="menu-icon fa fa-cogs"></i>Study Destination</a>
                    <ul class="sub-menu children dropdown-menu @if(Route::is('study_destination.*')) show @endif">                            
                        <li>
                            <a href="{{route('study_destination.page.layout')}}">Page Layout</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                        <li class="">
                            <a href="{{route('study_destination.card')}}">Destination Card</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown @if(Route::is('university.*')) show active @endif">
                    <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{Route::is('university.*') ? 'true' : 'false'}}"> 
                    <i class="menu-icon fa fa-cogs"></i>University</a>
                    <ul class="sub-menu children dropdown-menu @if(Route::is('university.*')) show @endif">                            
                        <li>
                            <a href="{{route('university.page.layout')}}">Layout & Logos</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                        <li class="">
                            <a href="{{route('university.card')}}">University Card</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                    </ul>
                </li>
                
                <li class="{{ Route::is('course.index')? 'active': '' }}">
                    <a href="{{route('course.index')}}"><i class="menu-icon ti-image"></i>Course Page</a>
                </li>

                <li class="{{ Route::is('scholarship.index')? 'active': '' }}">
                    <a href="{{route('scholarship.index')}}"><i class="menu-icon ti-image"></i>Scholarship Page</a>
                </li>

                <li class="menu-item-has-children dropdown @if(Route::is('about_us.*')) show active @endif">
                    <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{Route::is('university.*') ? 'true' : 'false'}}"> 
                    <i class="menu-icon fa fa-cogs"></i>About Us</a>
                    <ul class="sub-menu children dropdown-menu @if(Route::is('about_us.*')) show @endif">                            
                        <li>
                            <a href="{{route('about_us.page.layout')}}">Page Layout</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>

                        <li>
                            <a href="{{route('about_us.card')}}">Cards</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Settings</li>
                <li class="{{ Route::is('site_setting.index')? 'active': '' }}">
                    <a href="{{route('site_setting.index')}}"><i class="menu-icon ti-settings"></i>Site Setting</a>
                </li>

                <li class="{{ Route::is('footer_setting.index')? 'active': '' }}">
                    <a href="{{route('footer_setting.index')}}"><i class="menu-icon ti-settings"></i>Footer Setting</a>
                </li>


                
                {{-- <li class="menu-title">Accademics</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Accademics</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li class="">
                            <a href="">Classes</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>

                        <li class="">
                            <a href="">Sections</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                        <li class="">
                            <a href="">Subjects</a>
                            <i class="fa fa-puzzle-piece"></i>
                        </li>
                        
                    </ul>
                </li>

              

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>

                <li class="menu-title">Icons</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->