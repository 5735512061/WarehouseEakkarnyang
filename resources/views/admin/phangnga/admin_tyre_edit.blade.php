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
                            <div class="col-lg-8">
                                <div class="card">
                                <form action="{{url('/admin/phangnga/update-tyre')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">{{csrf_field()}}
                                    <div class="card-header">
                                        แก้ไขข้อมูลยางรถยนต์
                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">เลือกยี่ห้อสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="category" name="category" value="{{$tyre->category}}" class="form-control" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">รุ่นสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="model" name="model" value="{{$tyre->model}}" class="form-control" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ขนาดยาง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="size" name="size" value="{{$tyre->size}}" class="form-control" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ราคาต้นทุน</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cost" name="cost" value="{{$tyre->cost}}" class="form-control" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="amount" name="amount" value="{{$tyre->amount}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ปีที่ผลิต</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="year" name="year" value="{{$tyre->year}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">หมายเหตุ</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="comment" name="comment" value="{{$tyre->comment}}" class="form-control">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="id" value="{{$tyre->id}}">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> อัพเดตข้อมูล
                                        </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
</div>
@endsection