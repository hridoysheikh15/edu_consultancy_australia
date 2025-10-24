@php
    $footerLayout = \App\Models\FooterSetting::first();
    $footerCard = \App\Models\FooterCard::take(4)->get();
@endphp

<footer id="contact">
    <!--? Footer Start-->
    <div class="footer-area section-bg position-relative">
        <img class="footer-shape shape-1" src="{{ asset('front_assets/img/footer-shape 1.png') }}" alt="world" loading="lazy">
        <img class="footer-shape shape-2" src="{{ asset('front_assets/img/footer-shape 2.png') }}" alt="Building" loading="lazy">
        <div class="container">
            <div class="footer-top pt-5 pb-3">
                <h2>{{ $footerLayout?->header }}</h2>
                <div class="rich-small">
                    {!! $footerLayout?->description !!}
                </div>
                <div class="main-branch my-5">
                    {{-- <h4>{{ $footerLayout?->branch_title }}</h4> --}}
                    @php
                        if ($footerCard->isNotEmpty()) {
                            $firstCard = $footerCard->first();
                        } else {
                            $firstCard = null;
                        }
                    @endphp
                    <div class="d-flex gap-3 align-items-center">
                        <img class="branch-flag" src="{{ asset($firstCard?->image)}}" alt="National Flag" loading="lazy">
                        <h6 class="branch-name">{{ $firstCard?->header }}</h6>
                    </div>
                    <p class="sm-font">
                        {{ $firstCard?->address }}
                    </p>
                    <h6 class="phone-number">
                        <a href="tel:{{ $firstCard?->phone }}">{{ $firstCard?->phone }}</a>
                    </h6>
                    <h6 class="email">
                        <a href="mailto:{{ $firstCard?->email }}">{{ $firstCard?->email }}</a>
                    </h6>
                </div>
                <h4 class="text-uppercase ff-poppins">Our Others Branch Info</h4>
                <div class="row">
                    @foreach ($footerCard->skip(1) as $card)
                        <div class="col-sm-6 col-md-4">
                            <div class="sub-branch all-branches">
                                <div class="d-flex gap-3 align-items-center mb-2">
                                    <img class="branch-flag" src="{{ asset($card->image)}}" alt="National Flag" loading="lazy">
                                    <h6 class="branch-name">{{ $card->header }}</h6>
                                </div>
                                <div class="sm-font">
                                    <address class="mb-3">
                                        {{ $card->address }}
                                    </address>
                                    <h6 class="email">
                                        <a href="mailto:{{ $card?->email }}">{{ $card?->email }}</a>
                                    </h6>
                                    <h6 class="phone-number mb-1">
                                        <a href="tel:{{ $card?->phone }}">{{ $card?->phone }}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p class="m-0">
                               Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="ri-service-fill"></i> by <a href="https://www.chtsltd.com/" target="_blank">Classical Hunter Tech Solutions</a>
                            </p>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="{{ $site_setting?->twitter }}">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="{{ $site_setting?->facebook }}">
                                <i class="ri-facebook-circle-fill"></i>
                            </a>
                            <a href="{{ $site_setting?->whatsapp }}">
                                <i class="ri-whatsapp-fill"></i>
                            </a>
                            <a href="{{ $site_setting?->email }}">
                                <i class="ri-mail-add-line"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="quick-message" >
    <a title="Message us on Whatsapp" href="https://wa.me/{{ $site_setting?->whatsapp }}?text=Hello%2C%20I'm%20from%20your%20website.%20I%20need%20an%20inquiry." target="_blank">
        <img src="{{ asset('front_assets/img/whatsapp.png') }}" alt="Whats app" loading="lazy">
    </a>
</div>