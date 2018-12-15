@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/admin/admin_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/admin/admin_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
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
                                                <a href="{{url('/admin/khokkloi/tyre')}}" class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/admin/khokkloi/max')}}" class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{url('/admin/khokkloi/oil')}}" class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/admin/khokkloi/battery')}}" class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/admin/khokkloi/brake')}}" class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/admin/khokkloi/shock')}}" class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="{{url('/admin/khokkloi/accessory')}}" class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
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
