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
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-10">
                                    <h6 class="title-3 m-b-10">
                                        <i class="zmdi zmdi-account-calendar"></i>สิทธิ์การเข้าใช้งาน</h6>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ชื่อ</td>
                                                    <td>เบอร์โทรศัพท์</td>
                                                    <td>สถานะ</td>
                                                    <td>บทบาท</td>
                                                    <td>หมายเหตุ</td>
                                                </tr>
                                            </thead>
                                            @foreach($roles as $role => $value)
                                            <tbody>
                                                <tr>    
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $role+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->customer_name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->tel}}</h6>
                                                        </div>
                                                    </td>
                                                    @if($value->status == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: green;">ใช้งานได้</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">บล็อค</h6>
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if($value->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>ดูได้ทุกสาขา</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->role == "2")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>สาขาโคกกลอย + สาขาบายพาส</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->role == "3")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>ดูได้เฉพาะสาขาโคกกลอย</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->role == "7")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>ดูได้เฉพาะสาขาบายพาส</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    @if($value->comment == "")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">-</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
