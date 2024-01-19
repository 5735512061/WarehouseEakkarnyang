@extends('template')

@section('content')
    <div class="page-wrapper">
        @include('/admin/admin_navbar_mobile')
        <!-- PAGE CONTAINER-->
        <div class="page-container" style="font-family: 'Noto Sans Thai', sans-serif;">
            {{-- @include('/admin/admin_navbar_desktop') --}}
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <form action="{{ url('/admin/thalang/create-tyre') }}" method="POST"
                                        enctype="multipart/form-data" class="form-horizontal">{{ csrf_field() }}
                                        <div class="card-header">
                                            เพิ่มข้อมูลยางรถยนต์
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select"
                                                        class=" form-control-label">เลือกยี่ห้อสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">

                                                    <body onload="hiddenn('0')">
                                                        <select name="category" id="category" class="form-control">
                                                            <option>กรุณาเลือกยี่ห้อสินค้า</option>
                                                            @foreach ($tyrecategories as $tyrecategory => $value)
                                                                @if ($value->category == 'อื่นๆ')
                                                                    <option value="อื่นๆ" onclick="hiddenn('1')">อื่นๆ
                                                                    </option>
                                                                    <input type="text" name="txt1" id="txt1"
                                                                        class="form-control" style="width:150px;">
                                                                @else
                                                                    <option value="{{ $value->category }}"
                                                                        onclick="hiddenn('0')">{{ $value->category }}
                                                                    </option>
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
                                                    <input type="text" id="model" name="model"
                                                        placeholder="กรุณากรอกรุ่นสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ขนาดยาง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="size" name="size"
                                                        placeholder="กรุณากรอกขนาดยาง" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="amount" name="amount"
                                                        placeholder="กรุณากรอกจำนวนสินค้า" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ปีผลิต</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="year" name="year"
                                                        placeholder="กรุณากรอกปีผลิต" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">สัปดาห์ยาง
                                                        (DOT)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="dot" name="dot"
                                                        placeholder="กรุณากรอกสัปดาห์ยาง (DOT)" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input"
                                                        class=" form-control-label">จำนวนที่ต้องสต๊อก</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stock" name="stock"
                                                        placeholder="กรุณากรอกจำนวนที่ต้องสต๊อก" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select"
                                                        class=" form-control-label">สินค้าที่ต้องสต๊อก</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="stock_required" class="form-control">
                                                        <option>ต้องสต๊อก</option>
                                                        <option>ไม่ต้องสต๊อก</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="admin_id"
                                                value="{{ auth('admin')->user()->id }}">
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
            </div>
        </div>
    </div>

    <script>
        function hiddenn(pvar) {
            if (pvar == 0) {
                document.getElementById("txt1").style.display = 'none';
            } else {
                document.getElementById("txt1").style.display = '';
            }
        }
    </script>
@endsection
