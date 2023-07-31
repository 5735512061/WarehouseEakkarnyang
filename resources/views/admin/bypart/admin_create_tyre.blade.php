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
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        เลือกประเภทสินค้า
                                    </div>
                                    <div class="card-body">
                                        <a href="{{url('/admin/bypart/create-tyre')}}" class="btn btn-outline-primary btn-lg btn-block">ยางรถยนต์</a>
                                        {{-- <a href="{{url('/admin/bypart/create-max')}}" class="btn btn-outline-primary btn-lg btn-block">แม็กซ์</a>
                                        <a href="{{url('/admin/bypart/create-oil')}}" class="btn btn-outline-primary btn-lg btn-block">น้ำมันเครื่อง</a>
                                        <a href="{{url('/admin/bypart/create-battery')}}" class="btn btn-outline-primary btn-lg btn-block">แบตเตอรี่</a>
                                        <a href="{{url('/admin/bypart/create-brake')}}" class="btn btn-outline-primary btn-lg btn-block">เบรก</a>
                                        <a href="{{url('/admin/bypart/create-shock')}}" class="btn btn-outline-primary btn-lg btn-block">โช้ค</a>
                                        <a href="{{url('/admin/bypart/create-accessory')}}" class="btn btn-outline-primary btn-lg btn-block">อะไหล่รถยนต์</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                <form action="{{url('/admin/bypart/create-tyre')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">{{csrf_field()}}
                                    <div class="card-header">
                                        เพิ่มข้อมูลยางรถยนต์
                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">เลือกยี่ห้อสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <body onload="hiddenn('0')">
                                                    <select name="category" id="category" class="form-control">
                                                        <option>กรุณาเลือกยี่ห้อสินค้า</option>
                                                        @foreach($tyrecategories as $tyrecategory => $value)
                                                            @if($value->category == "อื่นๆ")
                                                                <option value="อื่นๆ" onclick="hiddenn('1')">อื่นๆ</option>
                                                                <input type="text" name="txt1" id="txt1"  class="form-control" style="width:150px;">
                                                            @else
                                                                <option value="{{$value->category}}" onclick="hiddenn('0')">{{$value->category}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">รุ่นสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="model" name="model" placeholder="กรุณากรอกรุ่นสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ขนาดยาง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="size" name="size" placeholder="กรุณากรอกขนาดยาง" class="form-control">
                                                </div>
                                            </div>
                                            {{-- <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ราคาต้นทุนส่ง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cost" name="cost" placeholder="กรุณากรอกราคาต้นทุนส่งสินค้า" class="form-control">
                                                </div>
                                            </div> --}}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="amount" name="amount" placeholder="กรุณากรอกจำนวนสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ปีผลิต</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="year" name="year" placeholder="กรุณากรอกปีผลิต" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">สัปดาห์ยาง (DOT)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="dot" name="dot" placeholder="กรุณากรอกสัปดาห์ยาง (DOT)" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนที่ต้องสต๊อก</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stock" name="stock" placeholder="กรุณากรอกจำนวนที่ต้องสต๊อก" class="form-control">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="admin_id" value="{{auth('admin')->user()->id}}">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> บันทึกข้อมูล
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

<script>
function hiddenn(pvar) {
   if(pvar==0){
    document.getElementById("txt1").style.display = 'none';
   }else{
   document.getElementById("txt1").style.display = '';
   }   
}
</script>
@endsection