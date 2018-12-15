@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/master/master_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        	@include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-6" style="margin-left: 20px; margin-bottom: 5px;">
                    <form class="form-header" action="{{url('/master/thaiwatsadu/search')}}" method="POST">{{ csrf_field() }}
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="ค้นหาสินค้า" autocomplete="off" />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                    </form>
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
                                <a class="nav-item nav-link" id="custom-nav-kumho-tab" data-toggle="tab" href="#custom-nav-kumho" role="tab" aria-controls="custom-nav-kumho" aria-selected="false">Kumho</a>
                                <a class="nav-item nav-link" id="custom-nav-pirelli-tab" data-toggle="tab" href="#custom-nav-pirelli" role="tab" aria-controls="custom-nav-pirelli" aria-selected="false">Pirelli</a>
                                <a class="nav-item nav-link" id="custom-nav-goodyear-tab" data-toggle="tab" href="#custom-nav-goodyear" role="tab" aria-controls="custom-nav-goodyear" aria-selected="false">Goodyear</a>
                                <a class="nav-item nav-link" id="custom-nav-kenda-tab" data-toggle="tab" href="#custom-nav-kenda" role="tab" aria-controls="custom-nav-kenda" aria-selected="false">Kenda</a>
                                <a class="nav-item nav-link" id="custom-nav-raiden-tab" data-toggle="tab" href="#custom-nav-raiden" role="tab" aria-controls="custom-nav-raiden" aria-selected="false">Raiden</a>
                                <a class="nav-item nav-link" id="custom-nav-orther-tab" data-toggle="tab" href="#custom-nav-orther" role="tab" aria-controls="custom-nav-orther" aria-selected="false">อื่นๆ</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-2 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="custom-nav-michelin" role="tabpanel" aria-labelledby="custom-nav-michelin-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-bf" role="tabpanel" aria-labelledby="custom-nav-bf-tab">                
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-otani" role="tabpanel" aria-labelledby="custom-nav-otani-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-yokohama" role="tabpanel" aria-labelledby="custom-nav-yokohama-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-bridgestone" role="tabpanel" aria-labelledby="custom-nav-bridgestone-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-maxxis" role="tabpanel" aria-labelledby="custom-nav-maxxis-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-toyo" role="tabpanel" aria-labelledby="custom-nav-toyo-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-nitto" role="tabpanel" aria-labelledby="custom-nav-nitto-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-kumho" role="tabpanel" aria-labelledby="custom-nav-kumho-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-pirelli" role="tabpanel" aria-labelledby="custom-nav-pirelli-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-goodyear" role="tabpanel" aria-labelledby="custom-nav-goodyear-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>                                         <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-kenda" role="tabpanel" aria-labelledby="custom-nav-kenda-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
                                            @foreach($kendas as $kenda => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $kenda+1}}</h6>
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-raiden" role="tabpanel" aria-labelledby="custom-nav-raiden-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <div class="tab-pane fade" id="custom-nav-other" role="tabpanel" aria-labelledby="custom-nav-other-tab">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <form action="{{url('/master/thaiwatsadu/delete')}}" method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด
                                                                    <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <button type="button" data-toggle="modal" data-target="#delete">
                                                                    <i class="fa fa-minus-circle" style="color:red;"></i>
                                                                </button>
                                                                {{$value->amount}} 
                                                                <button type="button" data-toggle="modal" data-target="#add">
                                                                    <i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                </button>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div style="color: red;">หมด</div>
                                                                @else
                                                                    {{$value->amount}}
                                                                @endif
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <a href="{{url('/master/thaiwatsadu/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
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
                            <form action="#">
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>ลบจำนวนสินค้า</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" style="height: calc(1.5rem)" placeholder="จำนวนสินค้าที่ต้องการลบ">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                                            <button type="button" class="btn btn-danger btn-sm">ลบ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- end modal delete -->
                            <!-- modal add -->
                            <form action="#">
                            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>เพิ่มจำนวนสินค้า</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" style="height: calc(1.5rem)" placeholder="จำนวนสินค้าที่ต้องการเพิ่ม">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                                            <button type="button" class="btn btn-primary btn-sm">เพิ่ม</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- end modal add -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection