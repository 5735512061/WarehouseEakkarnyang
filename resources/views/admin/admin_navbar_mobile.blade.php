<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none" style="font-family: 'Noto Sans Thai', sans-serif;">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('/admin/khokkloi/tyre')}}">
                            <img src="{{ asset('/template/images/icon/logo.jpg')}}" alt="เอกการยาง" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-dot-circle-o"></i>คลังสินค้า</a>
                            <ul class="list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('/admin/stock-main/tyre')}}">คลังสินค้าหลัก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/khokkloi/tyre')}}">สาขาโคกกลอย</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/bypart/tyre')}}">สาขาบายพาส</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thaiwatsadu/tyre')}}">สาขาไทวัสดุ</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/chaofa/tyre')}}">สาขาเจ้าฟ้าตะวันออก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thalang/tyre')}}">สาขาถลาง</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/phangnga/tyre')}}">สาขาเมืองพังงา</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                            <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" style="font-family: 'Noto Sans Thai', sans-serif;">
            <div class="logo">
                <a href="{{url('/admin/khokkloi/tyre')}}">
                    <img src="{{ asset('/template/images/icon/logo.jpg')}}" alt="เอกการยาง" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-dot-circle-o"></i>คลังสินค้า</a>
                            <ul class="list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('/admin/stock-main/tyre')}}">คลังสินค้าหลัก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/khokkloi/tyre')}}">สาขาโคกกลอย</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/bypart/tyre')}}">สาขาบายพาส</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thaiwatsadu/tyre')}}">สาขาไทวัสดุ</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/chaofa/tyre')}}">สาขาเจ้าฟ้าตะวันออก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thalang/tyre')}}">สาขาถลาง</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/phangnga/tyre')}}">สาขาเมืองพังงา</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                            <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->