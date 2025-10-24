 <!-- Header-->
 @php
    $site_data = \App\Models\SiteSetting::first();
    $contactCount = \App\Models\ContactUs::where('is_read', 0)->latest()->take(5)->get();
 @endphp
 <header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img height="30px" src="{{asset($site_data?->logo) }}" alt="Logo" loading="lazy">
            </a>
            
            <a class="navbar-brand hidden" href="{{ route('dashboard') }}"><img src="{{ asset($site_data?->logo)}}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>

                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{ $contactCount?->count() ?? 0}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have {{ $contactCount?->count() ?? 0}} Notification</p>
                        @foreach ($contactCount as $item)
                            <a class="dropdown-item media" href="{{ route('contact_us.request') }}">
                                <i class="fa fa-info"></i>
                                <p>{{ $item?->name }} - {{ $item?->phone}} </p>
                            </a>
                        @endforeach
                    </div>
                </div>

            
            </div>
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('backend/images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ route('profile.index')}}"><i class="fa fa- user"></i>My Profile</a>

                    <a class="nav-link" href="{{ route('site_setting.index')}}"><i class="fa fa -cog"></i>Settings</a>

                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="javascript:void(0);" class="nav-link" onclick="document.getElementById('logoutForm').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- /#header -->