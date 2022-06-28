<div class="topnav">
    <div class="container-fluid">

        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    @isset($data)
                        @foreach($data as $main)

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button">
                                    <i class="ri-apps-2-line me-2"></i>{{$main['title']}}

                                    @isset($main['data'])
                                        <div class="arrow-down"></div>
                                    @endisset
                                </a>
                                @isset($main['data'])
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        @foreach($main['data'] as $sub)
                                            <a href="calendar.html" class="dropdown-item">{{$sub['title']}}</a>

                                        @endforeach

                                    </div>
                                @endisset

                            </li>
                        @endforeach
                    @endisset

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                            <i class="ri-contacts-line"></i> About Us
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button">
                            <i class="ri-phone-line me-2"></i><span key="t-layouts">Contact Us</span>
                        </a>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
