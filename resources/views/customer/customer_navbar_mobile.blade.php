<header class="header-mobile d-block d-lg-none" style="font-family: 'Noto Sans Thai', sans-serif;">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="{{ asset('/template/images/icon/logo.jpg') }}" alt="เอกการยาง" />
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
                    <ul class=" list-unstyled js-sub-list">
                        @if (auth('customer')->user()->role == 1)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/bypart/tyre') }}">สาขาบายพาส</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thalang/tyre') }}">สาขาถลาง</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 2)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 3)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 4)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 5)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 6)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 7)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 8)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 9)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/bypart/tyre') }}">สาขาบายพาส</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 10)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (auth('customer')->user()->role == 8 || auth('customer')->user()->role == 9)
                @else
                    <li><a style="color: red;" href="{{ url('/customer/stock-amount') }}">สรุปสต๊อกสินค้า</a></li>
                @endif
                <li>
                    <a href="{{ route('customer.logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                    <form id="logout-form"
                        action="{{ 'App\Customer' == Auth::getProvider()->getModel() ? route('customer.logout') : route('customer.logout') }}"
                        method="POST">
                        @csrf
                    </form>
                </li>
                <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>รายการซื้อ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">สั่งซื้อ</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการซื้อ</a>
                                </li>
                            </ul>
                        </li> -->
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" style="font-family: 'Noto Sans Thai', sans-serif !important;">
    <div class="logo">
        <a href="{{ url('/customer/khokkloi/tyre') }}">
            <img src="{{ asset('/template/images/icon/logo.jpg') }}" alt="เอกการยาง" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1" style="font-family: 'Noto Sans Thai', sans-serif;">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-dot-circle-o"></i>คลังสินค้า</a>
                    <ul class="list-unstyled js-sub-list">
                        @if (auth('customer')->user()->role == 1)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/bypart/tyre') }}">สาขาบายพาส</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thalang/tyre') }}">สาขาถลาง</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 2)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 3)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 4)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 5)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 6)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 7)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 8)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 9)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/bypart/tyre') }}">สาขาบายพาส</a>
                            </li>
                        @elseif(auth('customer')->user()->role == 10)
                            <li>
                                <a href="{{ url('/customer/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (auth('customer')->user()->role == 8 || auth('customer')->user()->role == 9)
                @else
                    <li><a style="color: red;" href="{{ url('/customer/stock-amount') }}">สรุปสต๊อกสินค้า</a></li>
                @endif
                <li>
                    <a href="{{ route('customer.logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                    <form id="logout-form"
                        action="{{ 'App\Customer' == Auth::getProvider()->getModel() ? route('customer.logout') : route('customer.logout') }}"
                        method="POST">
                        @csrf
                    </form>
                </li>
                <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>รายการซื้อ</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">สั่งซื้อ</a>
                                </li>
                                <li>
                                    <a href="#">ดูรายการซื้อ</a>
                                </li>
                            </ul>
                        </li> -->
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR
