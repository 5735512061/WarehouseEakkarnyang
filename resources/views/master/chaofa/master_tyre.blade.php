@extends('template')

@section('content')
    @include('/master/master_navbar_mobile')
    <!-- PAGE CONTAINER-->
    <div class="page-container" style="font-family: 'Noto Sans Thai', sans-serif !important;">
        {{-- @include("/master/master_navbar_desktop") --}}
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <center>
                <h2 style="color: #fff;">คลังสินค้า สาขาเจ้าฟ้าตะวันออก</h2>
            </center>
            <center>
                <div class="col-md-4 mt-3">
                    <a href="{{ url('/master/chaofa/create-tyre') }}" type="button" class="btn btn-primary"><i
                            class="zmdi zmdi-plus"></i> เพิ่มสินค้าในคลัง</a>
                </div>
                <div class="col-md-8 mt-3" style="margin-bottom: 15px;">
                    <form class="form-header" action="{{ url('/master/chaofa/search') }}" method="POST">{{ csrf_field() }}
                        <input class="au-input au-input--xl" type="text" name="search"
                            placeholder="ค้นหาสินค้า เช่น 185/60R15" autocomplete="off" />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
            </center>
            <center>
                <div class="col-md-3">
                    <input type="hidden" value="check" name="check">
                    <div style="color: #ffffff;">
                        <input type="checkbox" id="check_have_product" onclick="func_Check_have_product()">
                        แสดงเฉพาะสินค้าที่มี
                    </div>
                </div>
            </center>
            @php
                $amount_michelin = DB::table('tyrechaofas')
                    ->where('category', 'MICHELIN')
                    ->sum('amount');
                $amount_bfg = DB::table('tyrechaofas')
                    ->where('category', 'BF Goodrich')
                    ->sum('amount');
                $amount_otani = DB::table('tyrechaofas')
                    ->where('category', 'OTANI')
                    ->sum('amount');
                $amount_maxxis = DB::table('tyrechaofas')
                    ->where('category', 'MAXXIS')
                    ->sum('amount');
                $amount_yoko = DB::table('tyrechaofas')
                    ->where('category', 'YOKOHAMA')
                    ->sum('amount');
                $amount_brid = DB::table('tyrechaofas')
                    ->where('category', 'BRIDGESTONE')
                    ->sum('amount');
                $amount_toyo = DB::table('tyrechaofas')
                    ->where('category', 'TOYO')
                    ->sum('amount');
                $amount_nitto = DB::table('tyrechaofas')
                    ->where('category', 'NITTO')
                    ->sum('amount');
                $amount_goodyear = DB::table('tyrechaofas')
                    ->where('category', 'GOODYEAR')
                    ->sum('amount');
                $amount_raiden = DB::table('tyrechaofas')
                    ->where('category', 'RAIDEN')
                    ->sum('amount');
                $amount_other = DB::table('tyrechaofas')
                    ->where('category', 'อื่นๆ')
                    ->sum('amount');

                $sum = $amount_michelin + $amount_bfg + $amount_otani + $amount_maxxis + $amount_yoko + $amount_brid + $amount_toyo + $amount_nitto + $amount_goodyear + $amount_raiden + $amount_other;
                $sum_format = number_format($sum);

                $stock = DB::table('tyrechaofas')->sum('stock');
                $stock_format = number_format($stock);
            @endphp
            <center>
                <div class="col-md-4 mt-3">
                    <a href="#" type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal"><i class="zmdi zmdi-info-outline"></i> สรุปจำนวนสต๊อก</a>
                </div>
                <div class="col-md-4 mt-2" style="margin-bottom: 20px; color: #00ff0a;">
                    จำนวนที่มีในสต๊อกทั้งหมด {{ $sum_format }} เส้น
                </div>
                <div class="col-md-4 mt-2" style="margin-bottom: 15px; color: #ff7d30;">
                    จำนวนที่ต้องสต๊อก {{ $stock_format }} เส้น
                </div>
            </center>
            <!-- สรุปจำนวนสต๊อก -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">สรุปจำนวนสต๊อก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>MICHELIN = {{ $amount_michelin }} เส้น</p><br>
                            <p>BF Goodrich = {{ $amount_bfg }} เส้น</p><br>
                            <p>OTANI = {{ $amount_otani }} เส้น</p><br>
                            <p>MAXXIS = {{ $amount_maxxis }} เส้น</p><br>
                            <p>YOKOHAMA = {{ $amount_yoko }} เส้น</p><br>
                            <p>BRIDGESTONE = {{ $amount_brid }} เส้น</p><br>
                            <p>TOYO = {{ $amount_toyo }} เส้น</p><br>
                            <p>NITTO = {{ $amount_nitto }} เส้น</p><br>
                            <p>Goodyear = {{ $amount_goodyear }} เส้น</p><br>
                            <p>RAIDEN = {{ $amount_raiden }} เส้น</p><br>
                            <p>อื่นๆ = {{ $amount_other }} เส้น</p><br><br>
                            <p style="color: red;">รวมทั้งหมด {{ $sum_format }} เส้น</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="custom-tab">
                    <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        {{-- <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_mi"
                                                            onclick="func_Check_stock_mi()">  --}}
                                                        จำนวนที่ต้องสต๊อก
                                                    </td>
                                                    @if (Auth::user()->role == '1')
                                                        <td></td>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <form method="POST" role="form">
                                                {{ csrf_field() }}
                                                @foreach ($tyres as $tyre => $value)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="table-data__info">
                                                                    <h6>{{ $NUM_PAGE * ($page - 1) + $tyre + 1 }}
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-data__info">
                                                                    <h6>{{ $value->size }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-data__info">
                                                                    <h6>{{ $value->model }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-data__info">
                                                                    <h6>
                                                                        @if (Auth::user()->role == '1')
                                                                            @if ($value->amount == 0)
                                                                                <div class="flex-container">
                                                                                    <div class="col-sm-1">
                                                                                        <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#delete"
                                                                                            data-id="{{ $value->id }}">
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <div class="dont_have_amount"
                                                                                            style="color: red;">หมด
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#add"
                                                                                            data-id="{{ $value->id }}"><i
                                                                                                class="fa fa-plus-circle"
                                                                                                style="color:blue;"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="flex-container">
                                                                                    <div class="col-sm-1">
                                                                                        <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#delete"
                                                                                            data-id="{{ $value->id }}"><i
                                                                                                class="fa fa-minus-circle"
                                                                                                style="color:red;"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-sm-1 have_amount">
                                                                                        {{ $value->amount }}
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#add"
                                                                                            data-id="{{ $value->id }}"><i
                                                                                                class="fa fa-plus-circle"
                                                                                                style="color:blue;"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            @if ($value->amount == 0)
                                                                                <div class="dont_have_amount"
                                                                                    style="color: red;">หมด</div>
                                                                            @else
                                                                                <div class="col-sm-1 have_amount">
                                                                                    {{ $value->amount }}
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            @if ($value->year == '2023')
                                                                <td>
                                                                    <div class="table-data__info">
                                                                        <h6 style="color:#000;">
                                                                            {{ $value->year }}</h6>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <div class="table-data__info">
                                                                        <h6 style="color:red;">{{ $value->year }}
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <div class="table-data__info">
                                                                    <h6>{{ $value->dot }}</h6>
                                                                </div>
                                                            </td>
                                                            @if ($value->stock_required == 'ต้องสต๊อก')
                                                                <td>
                                                                    @if ($value->stock == 0)
                                                                        <div
                                                                            class="table-data__info__stock__have stock_mi">
                                                                            <h6>0</h6>
                                                                        </div>
                                                                    @else
                                                                        <div class="table-data__info__stock__have">
                                                                            <h6>{{ $value->stock }}</h6>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            @elseif($value->stock_required == 'ไม่ต้องสต๊อก')
                                                                <td>
                                                                    @if ($value->stock == 0)
                                                                        <div class="table-data__info__stock__not stock_mi">
                                                                            <h6>0</h6>
                                                                        </div>
                                                                    @else
                                                                        <div class="table-data__info__stock__not">
                                                                            <h6>{{ $value->stock }}</h6>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                            @if (Auth::user()->role == '1')
                                                                <td>
                                                                    <a
                                                                        href="{{ url('/master/chaofa/edit/') }}/{{ $value->id }}">
                                                                        <i class="fa fa-pencil-square"
                                                                            style="color:blue;"></i>
                                                                    </a>
                                                                    <button
                                                                        formaction="{{ url('/master/chaofa/tyredelete/') }}/{{ $value->id }}"
                                                                        onclick="return confirm('Are you sure to delete ?')">
                                                                        <i class="fa fa-trash"
                                                                            style="color:red;"></i></button>{{ csrf_field() }}
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $value->id }}">
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal delete -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>ลบจำนวนสินค้า</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/master/chaofa/delete-tyre') }}" method="POST"
                            enctype="multipart/form-data" autocomplete="off">@csrf
                            <div class="modal-body">
                                <input type="text" class="form-control" name="amount"
                                    placeholder="จำนวนสินค้าที่ต้องการลบ">
                                <input type="hidden" name="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal delete -->
            <!-- modal add -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>เพิ่มจำนวนสินค้า</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/master/chaofa/add-tyre') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">@csrf
                            <div class="modal-body">
                                <input type="text" class="form-control" name="amount"
                                    placeholder="จำนวนสินค้าที่ต้องการเพิ่ม">
                                <input type="hidden" name="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary btn-sm">เพิ่ม</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal add -->
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script>
        $(document).ready(function() {

            $('#add').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')

                var modal = $(this)

                modal.find('.modal-body input[name="id"]').val(id)
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#delete').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')

                var modal = $(this)

                modal.find('.modal-body input[name="id"]').val(id)
            })
        });

        function func_Check_have_product() {
            // Get the checkbox
            var checkBox = document.getElementById("check_have_product");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                $.each($('.dont_have_amount'), function(index, val) {
                    $(val).parents('tr')[0].style.display = "none"
                });
            } else {
                $.each($('.dont_have_amount'), function(index, val) {
                    $(val).parents('tr')[0].style.display = "table-row"
                });
            }
        }
    </script>
@endsection
