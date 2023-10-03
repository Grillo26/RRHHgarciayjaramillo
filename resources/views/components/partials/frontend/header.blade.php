<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{  route('frontend')  }}" class="logo__black"><img src="{{ asset('ui/frontend') }}/assets/img/logo/logo_black.png" alt=""></a>
                                <a href="{{  route('frontend')  }}" class="logo__white"><img src="{{ asset('ui/frontend') }}/assets/img/logo/logo_white.png" alt=""></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{  route('frontend')  }}">Home</a></li>
                                    <li><a href="{{  route('about')  }}">About</a></li>
                                    <li><a href="{{  route('service')  }}">Services</a></li>
                                    <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{  route('portfolio')  }}">Portfolio</a></li>
                                            <li><a href="{{ route('portfolio.details') }}">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{  route('ourblog')  }}">Our News</a></li>
                                            <li><a href="{{ route('ourblog.details') }}">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{  route('contact')  }}">contact me</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{  route('contact')  }}" class="btn">Contact me</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img src="{{ asset('ui/frontend') }}/assets/img/logo/logo_black.png" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('ui/frontend') }}/assets/img/logo/logo_white.png" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>