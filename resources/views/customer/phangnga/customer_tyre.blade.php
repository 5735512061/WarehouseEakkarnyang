@extends("template")

@section("content")
	@include("/customer/customer_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        	{{-- @include("/customer/customer_navbar_desktop") --}}
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <center><h2 style="color: #fff;">คลังสินค้า สาขาเมืองพังงา</h2></center>
                <center>
                    <div class="col-md-8 mt-3" style="margin-bottom: 15px;">
                        <form class="form-header" action="{{url('/customer/phangnga/search')}}" method="POST">{{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="ค้นหาสินค้า เช่น 185/60R15" autocomplete="off" />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </center>
                <center><div class="col-md-3">
                    <input type="hidden" value="check" name="check">
                        <div style="color: #ffffff;">
                            <input type="checkbox" id="check_have_product"  onclick="func_Check_have_product()"> แสดงเฉพาะสินค้าที่มี
                        </div>
                    </div>
                </center>
                @php
                    $amount_michelin = DB::table('tyrephangngas')->where('category','MICHELIN')->sum('amount');
                    $amount_bfg = DB::table('tyrephangngas')->where('category','BF Goodrich')->sum('amount');
                    $amount_otani = DB::table('tyrephangngas')->where('category','OTANI')->sum('amount');
                    $amount_maxxis = DB::table('tyrephangngas')->where('category','MAXXIS')->sum('amount');
                    $amount_yoko = DB::table('tyrephangngas')->where('category','YOKOHAMA')->sum('amount');
                    $amount_brid = DB::table('tyrephangngas')->where('category','BRIDGESTONE')->sum('amount');
                    $amount_toyo = DB::table('tyrephangngas')->where('category','TOYO')->sum('amount');
                    $amount_nitto = DB::table('tyrephangngas')->where('category','NITTO')->sum('amount');
                    $amount_goodyear = DB::table('tyrephangngas')->where('category','GOODYEAR')->sum('amount');
                    $amount_raiden = DB::table('tyrephangngas')->where('category','RAIDEN')->sum('amount');
                    $amount_other = DB::table('tyrephangngas')->where('category','อื่นๆ')->sum('amount');

                    $sum = $amount_michelin + $amount_bfg + $amount_otani + $amount_maxxis + $amount_yoko + $amount_brid
                            + $amount_toyo + $amount_nitto + $amount_goodyear + $amount_raiden + $amount_other;
                    $sum_format = number_format($sum);
                
                    $stock = DB::table('tyrephangngas')->sum('stock');
                    $stock_format = number_format($stock);
                @endphp
                <center>
                    <div class="col-md-4 mt-3">
                        <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="zmdi zmdi-info-outline"></i> สรุปจำนวนสต๊อก</a>
                    </div>
                    <div class="col-md-4 mt-2" style="margin-bottom: 20px; color: #00ff0a;">
                        จำนวนที่มีในสต๊อกทั้งหมด {{$sum_format}} เส้น
                    </div>
                    <div class="col-md-4 mt-2" style="margin-bottom: 15px; color: #ff7d30;">
                        จำนวนที่ต้องสต๊อก {{$stock_format}} เส้น
                    </div>
                </center>
                <!-- สรุปจำนวนสต๊อก -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">สรุปจำนวนสต๊อก</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>MICHELIN = {{$amount_michelin}} เส้น</p><br>
                                <p>BF Goodrich = {{$amount_bfg}} เส้น</p><br>
                                <p>OTANI = {{$amount_otani}} เส้น</p><br>
                                <p>MAXXIS = {{$amount_maxxis}} เส้น</p><br>
                                <p>YOKOHAMA = {{$amount_yoko}} เส้น</p><br>
                                <p>BRIDGESTONE = {{$amount_brid}} เส้น</p><br>
                                <p>TOYO = {{$amount_toyo}} เส้น</p><br>
                                <p>NITTO = {{$amount_nitto}} เส้น</p><br>
                                <p>Goodyear = {{$amount_goodyear}} เส้น</p><br>
                                <p>RAIDEN = {{$amount_raiden}} เส้น</p><br>
                                <p>อื่นๆ = {{$amount_other}} เส้น</p><br><br>
                                <p style="color: red;">รวมทั้งหมด {{$sum_format}} เส้น</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="custom-nav-michelin-tab" data-toggle="tab" href="#custom-nav-michelin" role="tab" aria-controls="custom-nav-michelin" aria-selected="true">Michelin</a>
                                <a class="nav-item nav-link" id="custom-nav-bf-tab" data-toggle="tab" href="#custom-nav-bf" role="tab" aria-controls="custom-nav-bf" aria-selected="false">BF Goodrich</a>
                                <a class="nav-item nav-link" id="custom-nav-otani-tab" data-toggle="tab" href="#custom-nav-otani" role="tab" aria-controls="custom-nav-otani" aria-selected="false">Otani</a>
                                <a class="nav-item nav-link" id="custom-nav-maxxis-tab" data-toggle="tab" href="#custom-nav-maxxis" role="tab" aria-controls="custom-nav-maxxis" aria-selected="false">Maxxis</a>
                                <a class="nav-item nav-link" id="custom-nav-yokohama-tab" data-toggle="tab" href="#custom-nav-yokohama" role="tab" aria-controls="custom-nav-yokohama" aria-selected="false">Yokohama</a>
                                <a class="nav-item nav-link" id="custom-nav-bridgestone-tab" data-toggle="tab" href="#custom-nav-bridgestone" role="tab" aria-controls="custom-nav-bridgestone" aria-selected="false">Bridgestone</a>
                                <a class="nav-item nav-link" id="custom-nav-toyo-tab" data-toggle="tab" href="#custom-nav-toyo" role="tab" aria-controls="custom-nav-toyo" aria-selected="false">Toyo</a>
                                <a class="nav-item nav-link" id="custom-nav-nitto-tab" data-toggle="tab" href="#custom-nav-nitto" role="tab" aria-controls="custom-nav-nitto" aria-selected="false">Nitto</a>
                                <a class="nav-item nav-link" id="custom-nav-goodyear-tab" data-toggle="tab" href="#custom-nav-goodyear" role="tab" aria-controls="custom-nav-goodyear" aria-selected="false">Goodyear</a>
                                <a class="nav-item nav-link" id="custom-nav-raiden-tab" data-toggle="tab" href="#custom-nav-raiden" role="tab" aria-controls="custom-nav-raiden" aria-selected="false">Raiden</a>
                                <a class="nav-item nav-link" id="custom-nav-other-tab" data-toggle="tab" href="#custom-nav-other" role="tab" aria-controls="custom-nav-other" aria-selected="false">อื่นๆ</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-2 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="custom-nav-michelin" role="tabpanel" aria-labelledby="custom-nav-michelin-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_mi"  onclick="func_Check_stock_mi()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($michelins as $michelin => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $michelin+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    <div class="col-sm-1 have_amount">
                                                                        {{$value->amount}}
                                                                    </div>
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_mi">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-bf" role="tabpanel" aria-labelledby="custom-nav-bf-tab">                
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_bf"  onclick="func_Check_stock_bf()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($goodrichs as $goodrich => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $goodrich+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_bf">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-otani" role="tabpanel" aria-labelledby="custom-nav-otani-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_ot"  onclick="func_Check_stock_ot()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($otanis as $otani => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $otani+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                                $balance = str_replace(',','',$value->cost); 
                                                                $balance = floatval($balance) - (0.1 * floatval($balance));
                                                                $balance = number_format($balance);
                                                            <h6>{{$balance}}</h6>
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_ot">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-yokohama" role="tabpanel" aria-labelledby="custom-nav-yokohama-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_yk"  onclick="func_Check_stock_yk()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($yokohamas as $yokohama => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $yokohama+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_yk">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-bridgestone" role="tabpanel" aria-labelledby="custom-nav-bridgestone-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_bt"  onclick="func_Check_stock_bt()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($bridgestones as $bridgestone => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $bridgestone+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_bt">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-maxxis" role="tabpanel" aria-labelledby="custom-nav-maxxis-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_mx"  onclick="func_Check_stock_mx()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($maxxiss as $maxxis => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $maxxis+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_mx">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-toyo" role="tabpanel" aria-labelledby="custom-nav-toyo-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_ty"  onclick="func_Check_stock_ty()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($toyos as $toyo => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $toyo+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_ty">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-nitto" role="tabpanel" aria-labelledby="custom-nav-nitto-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_nt"  onclick="func_Check_stock_nt()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($nittos as $nitto => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $nitto+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_nt">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="custom-nav-goodyear" role="tabpanel" aria-labelledby="custom-nav-goodyear-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_gy"  onclick="func_Check_stock_gy()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($goodyears as $goodyear => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $goodyear+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_gy">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="custom-nav-raiden" role="tabpanel" aria-labelledby="custom-nav-raiden-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_rd"  onclick="func_Check_stock_rd()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($raidens as $raiden => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $raiden+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_rd">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="custom-nav-other" role="tabpanel" aria-labelledby="custom-nav-other-tab">
                <div class="section__content section__content--p20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    {{-- <td>ราคาต้นทุนส่ง</td> --}}
                                                    <td>จำนวน</td>
                                                    <td>ปียาง</td>
                                                    <td>สัปดาห์ยาง (DOT)</td>
                                                    <td>
                                                        <input type="hidden" value="check" name="check">
                                                        <input type="checkbox" id="check_stock_other"  onclick="func_Check_stock_other()"> จำนวนที่ต้องสต๊อก
                                                    </td>
                                                </tr>
                                            </thead>
                                            @foreach($others as $other => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $other+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2023")
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:#000;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6 style="color:red;">{{$value->year}}</h6>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->dot}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($value->stock == 0)
                                                             <div class="table-data__info stock_other">
                                                                 <h6>0</h6>
                                                             </div>
                                                         @else 
                                                             <div class="table-data__info">
                                                                 <h6>{{$value->stock}}</h6>
                                                             </div>
                                                         @endif
                                                     </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    function func_Check_have_product() {
          // Get the checkbox
          var checkBox = document.getElementById("check_have_product");

          // If the checkbox is checked, display the output text
          if (checkBox.checked == true){
            $.each($('.dont_have_amount'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
          } else {
                $.each($('.dont_have_amount'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
          }
        }

    function func_Check_stock_mi() {
        var checkBox = document.getElementById("check_stock_mi");

        if (checkBox.checked == true){
                $.each($('.stock_mi'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_mi'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_bf() {
        var checkBox = document.getElementById("check_stock_bf");

        if (checkBox.checked == true){
                $.each($('.stock_bf'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_bf'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_ot() {
        var checkBox = document.getElementById("check_stock_ot");

        if (checkBox.checked == true){
                $.each($('.stock_ot'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_ot'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_mx() {
        var checkBox = document.getElementById("check_stock_mx");

        if (checkBox.checked == true){
                $.each($('.stock_mx'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_mx'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_yk() {
        var checkBox = document.getElementById("check_stock_yk");

        if (checkBox.checked == true){
                $.each($('.stock_yk'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_yk'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_bt() {
        var checkBox = document.getElementById("check_stock_bt");

        if (checkBox.checked == true){
                $.each($('.stock_bt'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_bt'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_ty() {
        var checkBox = document.getElementById("check_stock_ty");

        if (checkBox.checked == true){
                $.each($('.stock_ty'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_ty'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_nt() {
        var checkBox = document.getElementById("check_stock_nt");

        if (checkBox.checked == true){
                $.each($('.stock_nt'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_nt'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_gy() {
        var checkBox = document.getElementById("check_stock_gy");

        if (checkBox.checked == true){
                $.each($('.stock_gy'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_gy'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_rd() {
        var checkBox = document.getElementById("check_stock_rd");

        if (checkBox.checked == true){
                $.each($('.stock_rd'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_rd'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }

    function func_Check_stock_other() {
        var checkBox = document.getElementById("check_stock_other");

        if (checkBox.checked == true){
                $.each($('.stock_other'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
        } else {
                $.each($('.stock_other'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
        }
    }
</script>
@endsection