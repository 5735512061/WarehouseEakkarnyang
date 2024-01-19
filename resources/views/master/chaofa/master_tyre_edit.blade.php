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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <form action="{{ url('/master/chaofa/update-tyre') }}" method="POST"
                                        enctype="multipart/form-data" class="form-horizontal">{{ csrf_field() }}
                                        <div class="card-header">
                                            แก้ไขข้อมูลยางรถยนต์
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select"
                                                        class=" form-control-label">เลือกยี่ห้อสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="{{ $tyre->category }}">{{ $tyre->category }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">รุ่นสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="model" name="model"
                                                        value="{{ $tyre->model }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ขนาดยาง</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="size" name="size"
                                                        value="{{ $tyre->size }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">จำนวนสินค้า</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="amount" name="amount"
                                                        value="{{ $tyre->amount }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ปีผลิต</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="year" name="year"
                                                        value="{{ $tyre->year }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">สัปดาห์ยาง
                                                        (DOT)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="dot" name="dot"
                                                        value="{{ $tyre->dot }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input"
                                                        class=" form-control-label">จำนวนที่ต้องสต๊อก</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stock" name="stock"
                                                        value="{{ $tyre->stock }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select"
                                                        class=" form-control-label">สินค้าที่ต้องสต๊อก</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="stock_required" class="form-control">
                                                        <option>{{ $tyre->stock_required }}</option>
                                                        <option>ต้องสต๊อก</option>
                                                        <option>ไม่ต้องสต๊อก</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="master_id"
                                                value="{{ Auth::user()->id }}">
                                            <input type="hidden" class="form-control" name="id"
                                                value="{{ $tyre->id }}">
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
            </div>
        </div>
    </div>
@endsection
