@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/master/master_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @if(Auth::user()->role == "1" || Auth::user()->role == "2")
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
                                                <a href="{{url('/master/khokkloi/create-tyre')}}" class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/master/khokkloi/create-max')}}" class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/master/khokkloi/create-oil')}}" class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/create-battery')}}" class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/create-brake')}}" class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/create-shock')}}" class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/create-accessory')}}" class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
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
                                                <a href="{{url('/master/khokkloi/tyre')}}" class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/master/khokkloi/max')}}" class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/master/khokkloi/oil')}}" class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/battery')}}" class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/brake')}}" class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/shock')}}" class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/master/khokkloi/accessory')}}" class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
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
