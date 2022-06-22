<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="web-template/appziaadmin-20/appziaadmin-20/Appzia_v2.0/Admin/dist/index.html"
                       class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="web-template/appziaadmin-20/appziaadmin-20/Appzia_v2.0/Admin/dist/calendar.html"
                       class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="web-template/appziaadmin-20/appziaadmin-20/Appzia_v2.0/Admin/dist/apps-chat.html"
                       class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Chat</span>
                    </a>
                </li>
                {{--orders--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Orders </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.order')}}" class="">All Orders</a>
                        </li>


                    </ul>
                </li>

                {{--Category--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.category')}}" class="">All Category</a>
                        </li>


                    </ul>
                </li>
                {{--Brand--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Brand</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.brand')}}" class="">All Brand</a>
                        </li>


                    </ul>
                </li>
                {{--Color--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Color</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.color')}}" class="">All Color</a>
                        </li>


                    </ul>
                </li>
                {{--size--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Size</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.size')}}" class="">All Size</a>
                        </li>


                    </ul>
                </li>

                {{--city--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>City/State</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.city')}}" class="">create City/State</a>
                        </li>
                        <li>
                            <a href="{{route('index.state')}}" class="">Show State</a>
                        </li>

                    </ul>
                </li>

                {{--discount--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Discount</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.discount')}}" class="">All Discount</a>
                        </li>


                    </ul>
                </li>

                {{--products--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Proudct</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index.product')}}" class="">All Product</a>
                        </li>
                        <li>
                            <a href="{{route('create.product')}}" class="">Create new</a>
                        </li>


                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
