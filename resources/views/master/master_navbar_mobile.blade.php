<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none" style="font-family: 'Noto Sans Thai', sans-serif !important;">
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
                    @if (Auth::user()->role == '1')
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        @else
                            <ul class="list-unstyled js-sub-list">
                    @endif
                    @if (Auth::user()->role == '1')
                <li>
                    <a href="{{ url('/master/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                </li>
                <li>
                    <a href="{{ url('/master/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                </li>
                <li>
                    <a href="{{ url('/master/bypart/tyre') }}">สาขาบายพาส</a>
                </li>
                <li>
                    <a href="{{ url('/master/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                </li>
                <li>
                    <a href="{{ url('/master/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                </li>
                <li>
                    <a href="{{ url('/master/thalang/tyre') }}">สาขาถลาง</a>
                </li>
                <li>
                    <a href="{{ url('/master/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                </li>
            @else
                <li>
                    <a href="{{ url('/master/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                </li>
                <li>
                    <a href="{{ url('/master/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                </li>
                <li>
                    <a href="{{ url('/master/bypart/tyre') }}">สาขาบายพาส</a>
                </li>
                <li>
                    <a href="{{ url('/master/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                </li>
                <li>
                    <a href="{{ url('/master/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                </li>
                <li>
                    <a href="{{ url('/master/thalang/tyre') }}">สาขาถลาง</a>
                </li>
                <li>
                    <a href="{{ url('/master/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                </li>
                @endif
            </ul>
            </li>
            @if (Auth::user()->role == '1')
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-group"></i>ร้านค้า</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ url('/master/register-customer') }}">ลงทะเบียนร้านค้า</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/data-customer') }}">ข้อมูลร้านค้า</a>
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
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-gear"></i>จัดการบัญชี</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ url('/master/register-admin') }}">ลงทะเบียนผู้ใช้งาน</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/data-admin') }}">ผู้ใช้งาน</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/role') }}">สิทธิ์การเข้าใช้งาน</a>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" style="font-family: 'Noto Sans Thai', sans-serif !important;">
    <div class="logo">
        <a href="{{ url('/master/khokkloi/tyre') }}">
            <img src="{{ asset('/template/images/icon/logo.jpg') }}" alt="เอกการยาง" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-dot-circle-o"></i>คลังสินค้า</a>
                    @if (Auth::user()->role == '1')
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                        @else
                            <ul class="list-unstyled js-sub-list">
                    @endif
                    @if (Auth::user()->role == '1')
                <li>
                    <a href="{{ url('/master/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                </li>
                <li>
                    <a href="{{ url('/master/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                </li>
                <li>
                    <a href="{{ url('/master/bypart/tyre') }}">สาขาบายพาส</a>
                </li>
                <li>
                    <a href="{{ url('/master/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                </li>
                <li>
                    <a href="{{ url('/master/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                </li>
                <li>
                    <a href="{{ url('/master/thalang/tyre') }}">สาขาถลาง</a>
                </li>
                <li>
                    <a href="{{ url('/master/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                </li>
            @else
                <li>
                    <a href="{{ url('/master/stock-main/tyre') }}">คลังสินค้าหลัก</a>
                </li>
                <li>
                    <a href="{{ url('/master/khokkloi/tyre') }}">สาขาโคกกลอย</a>
                </li>
                <li>
                    <a href="{{ url('/master/bypart/tyre') }}">สาขาบายพาส</a>
                </li>
                <li>
                    <a href="{{ url('/master/thaiwatsadu/tyre') }}">สาขาไทวัสดุ</a>
                </li>
                <li>
                    <a href="{{ url('/master/chaofa/tyre') }}">สาขาเจ้าฟ้าตะวันออก</a>
                </li>
                <li>
                    <a href="{{ url('/master/thalang/tyre') }}">สาขาถลาง</a>
                </li>
                <li>
                    <a href="{{ url('/master/phangnga/tyre') }}">สาขาเมืองพังงา</a>
                </li>
                @endif
            </ul>
            </li>
            @if (Auth::user()->role == '1')
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-group"></i>ร้านค้า</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('/master/register-customer') }}">ลงทะเบียนร้านค้า</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/data-customer') }}">ข้อมูลร้านค้า</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-gear"></i>จัดการบัญชี</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('/master/register-admin') }}">ลงทะเบียนผู้ใช้งาน</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/data-admin') }}">ผู้ใช้งาน</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/role') }}">สิทธิ์การเข้าใช้งาน</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-account"></i>ข้อมูลผู้ใช้งาน</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('/master/profile') }}">แก้ไขบัญชีผู้ใช้</a>
                        </li>
                        <li>
                            <a href="{{ url('/master/changePassword') }}">เปลี่ยนรหัสผ่าน</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                            <form id="logout-form"
                                action="{{ 'App\User' == Auth::getProvider()->getModel() ? route('logout') : route('logout') }}"
                                method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
