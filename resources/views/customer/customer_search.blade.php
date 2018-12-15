@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/customer/customer_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        	@include("/customer/customer_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-6" style="margin-left: 15px; margin-bottom: 5px;">
                    <form class="form-header" action="{{url('/customer/khokkloi/search')}}" method="POST">{{ csrf_field() }}
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="ค้นหาสินค้า" autocomplete="off" />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
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
                                            @foreach($searchs as $search => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $search+1}}</h6>
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
                                                            <h6>{{$value->amount}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
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
@endsection