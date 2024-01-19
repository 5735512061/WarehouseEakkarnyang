<!-- HEADER DESKTOP-->
            <header class="header-desktop" style="font-family: 'Noto Sans Thai', sans-serif;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="">
                                <input class="au-input au-input--xl" type="hidden" name="search" placeholder="ค้นหาสินค้า" autocomplete="off" />
                            </form>
                            <div class="header-button">
                                <!-- <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image rounded-circle">
                                            <img src="{{url('images')}}/{{auth('admin')->user()->image}}">
                                        </div>
                                        <div class="content">   
                                            <a class="js-acc-btn" href="#">{{ auth('admin')->user()->admin_name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image rounded-circle">
                                                    <a href="#">
                                                        <img src="{{url('images')}}/{{auth('admin')->user()->image}}">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth('admin')->user()->admin_name }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth('admin')->user()->branch }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('/admin/profile')}}">
                                                        <i class="zmdi zmdi-account"></i>แก้ไขบัญชีผู้ใช้</a>
                                                </div>
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="{{url('/admin/changePassword')}}">
                                                        <i class="zmdi zmdi-settings"></i>เปลี่ยนรหัสผ่าน</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('ออกจากระบบ') }}
                                                </a>
                                                <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}" method="POST">
                                                    @csrf
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP