@extends('template')

@section('content')
    <div class="page-wrapper">
        @include('/master/master_navbar_mobile')
        <!-- PAGE CONTAINER-->
        <div class="page-container" style="font-family: 'Noto Sans Thai', sans-serif !important;">
            {{-- @include("/master/master_navbar_desktop") --}}
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @if (Auth::user()->role == '1')
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            เพิ่มสินค้าในคลัง
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{ url('/master/phangnga/create-tyre') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ url('/master/phangnga/create-max') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ url('/master/phangnga/create-oil') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 10px;">
                                                    <a href="{{ url('/master/phangnga/create-battery') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 10px;">
                                                    <a href="{{ url('/master/phangnga/create-brake') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 10px;">
                                                    <a href="{{ url('/master/phangnga/create-shock') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 10px;">
                                                    <a href="{{ url('/master/phangnga/create-accessory') }}"
                                                        class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        เลือกประเภทสินค้า
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ url('/master/phangnga/tyre') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('/master/phangnga/max') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('/master/phangnga/oil') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{ url('/master/phangnga/battery') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{ url('/master/phangnga/brake') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{ url('/master/phangnga/shock') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{ url('/master/phangnga/accessory') }}"
                                                    class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
