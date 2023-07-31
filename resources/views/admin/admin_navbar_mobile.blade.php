<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
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
                                    <a href="{{url('/admin/stock-main/warehouse')}}">คลังสินค้าหลัก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/khokkloi/warehouse')}}">สาขาโคกกลอย</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/bypart/warehouse')}}">สาขาบายพาส</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thaiwatsadu/warehouse')}}">สาขาไทวัสดุ</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/chaofa/warehouse')}}">สาขาเจ้าฟ้าตะวันออก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thalang/warehouse')}}">สาขาถลาง</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/phangnga/warehouse')}}">สาขาเมืองพังงา</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>รายงาน</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">สรุปรายงาน</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>รายการขาย</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">สร้างรายการขาย</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการขาย</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>รายการซื้อ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">สร้างรายการซื้อ</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการซื้อ</a>
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
        <aside class="menu-sidebar d-none d-lg-block">
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
                                    <a href="{{url('/admin/stock-main/warehouse')}}">คลังสินค้าหลัก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/khokkloi/warehouse')}}">สาขาโคกกลอย</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/bypart/warehouse')}}">สาขาบายพาส</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thaiwatsadu/warehouse')}}">สาขาไทวัสดุ</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/chaofa/warehouse')}}">สาขาเจ้าฟ้าตะวันออก</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/thalang/warehouse')}}">สาขาถลาง</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/phangnga/warehouse')}}">สาขาเมืองพังงา</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>รายงาน</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">สรุปรายงาน</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>รายการขาย</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">สร้างรายการขาย</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการขาย</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>รายการซื้อ</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">สร้างรายการซื้อ</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการซื้อ</a>
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