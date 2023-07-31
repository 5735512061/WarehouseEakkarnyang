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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        เลือกประเภทสินค้า
                                    </div>
                                    <div class="card-body">
                                        <a href="{{url('/master/thaiwatsadu/create-tyre')}}" class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                        <a href="{{url('/master/thaiwatsadu/create-max')}}" class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                        <a href="{{url('/master/thaiwatsadu/create-oil')}}" class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                        <a href="{{url('/master/thaiwatsadu/create-battery')}}" class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                        <a href="{{url('/master/thaiwatsadu/create-brake')}}" class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                        <a href="{{url('/master/thaiwatsadu/create-shock')}}" class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                        <a href="{{url('/master/thaiwatsadu/create-accessory')}}" class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        เพิ่มข้อมูลแบตเตอรี่
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">เลือกยี่ห้อสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="select" id="select" class="form-control">
                                                        <option value="0">กรุณาเลือกยี่ห้อสินค้า</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">รุ่นสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="text-input" placeholder="กรุณากรอกรุ่นสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ขนาด</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="text-input" placeholder="กรุณากรอกขนาด" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ราคาต้นทุนส่ง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="text-input" placeholder="กรุณากรอกราคาต้นทุนส่งสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="text-input" placeholder="กรุณากรอกจำนวนสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">โปรโมชั่น</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="text-input" placeholder="กรุณากรอกโปรโมชั่น" class="form-control" value="-">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> บันทึกข้อมูล
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
</div>
@endsection