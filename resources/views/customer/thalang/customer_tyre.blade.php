@extends("template")

@section("content")
	@include("/customer/customer_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        	@include("/customer/customer_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="row" style="margin-left: 20px; margin-bottom: 5px;">
                    <div class="col-md-3">
                        <div class="alert alert-primary" role="alert">
                            คลังสินค้าสาขาถลาง
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form class="form-header" action="{{url('/customer/thalang/search')}}" method="POST">{{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="ค้นหาสินค้า" autocomplete="off" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" style="margin-left: 40px; margin-bottom: 20px;">
                    <input type="hidden" value="check" name="check">
                        <div style="color: #ffffff;">
                            <input type="checkbox" id="check_have_product"  onclick="func_Check_have_product()"> แสดงเฉพาะสินค้าที่มี
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
                                {{-- <a class="nav-item nav-link" id="custom-nav-pirelli-tab" data-toggle="tab" href="#custom-nav-pirelli" role="tab" aria-controls="custom-nav-pirelli" aria-selected="false">Pirelli</a> --}}
                                <a class="nav-item nav-link" id="custom-nav-goodyear-tab" data-toggle="tab" href="#custom-nav-goodyear" role="tab" aria-controls="custom-nav-goodyear" aria-selected="false">Goodyear</a>
                                {{-- <a class="nav-item nav-link" id="custom-nav-kumho-tab" data-toggle="tab" href="#custom-nav-kumho" role="tab" aria-controls="custom-nav-kumho" aria-selected="false">Kumho</a> --}}
                                <a class="nav-item nav-link" id="custom-nav-raiden-tab" data-toggle="tab" href="#custom-nav-raiden" role="tab" aria-controls="custom-nav-raiden" aria-selected="false">Raiden</a>
                                {{-- <a class="nav-item nav-link" id="custom-nav-conti-tab" data-toggle="tab" href="#custom-nav-conti" role="tab" aria-controls="custom-nav-conti" aria-selected="false">Continental</a> --}}
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <?php 
                                                                $balance = str_replace(',','',$value->cost); 
                                                                $balance = floatval($balance) - (0.1 * floatval($balance));
                                                                $balance = number_format($balance);
                                                            ?>
                                                            <h6>{{$balance}}</h6>
                                                            {{-- <h6>{{$value->cost}}</h6> --}}
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                            <div class="tab-pane fade" id="custom-nav-pirelli" role="tabpanel" aria-labelledby="custom-nav-pirelli-tab">
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
                                                </tr>
                                            </thead>
                                            @foreach($pirellis as $pirelli => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $pirelli+1}}</h6>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                            <div class="tab-pane fade" id="custom-nav-kumho" role="tabpanel" aria-labelledby="custom-nav-kumho-tab">
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
                                                </tr>
                                            </thead>
                                            @foreach($kumhos as $kumho => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $kumho+1}}</h6>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                            <div class="tab-pane fade" id="custom-nav-conti" role="tabpanel" aria-labelledby="custom-nav-conti-tab">
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
                                                </tr>
                                            </thead>
                                            @foreach($continentals as $continental => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $continental+1}}</h6>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
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
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
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
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
</script>
@endsection