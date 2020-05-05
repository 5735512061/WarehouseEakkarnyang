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
                                        <i class="zmdi zmdi-account-calendar"></i>ข้อมูลผู้ใช้งาน</h6>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ชื่อ</td>
                                                    <td>สาขา</td>
                                                    <td>เบอร์โทรศัพท์</td>
                                                    <td>สถานะ</td>
                                                    <td>บทบาท</td>
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            @foreach($admins as $admin => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $admin+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->admin_name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                        	<h6>{{$value->branch}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    	<div class="table-data__info">
                                                        	<h6>{{$value->tel}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->status}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->role}}</h6>
                                                        </div>
                                                    </td>
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
                                                    <td>
                                                        <div class="table-data__info">
								                              	<form action="{{url('master/block')}}/{{$value->id}}" onsubmit="return myFunction('{{$admin}}');return false;" method="post">
								                              	<input type="hidden" name="note" id="myText{{$admin}}">
								                              	@if($value->status == "1")
								                              	{{csrf_field()}}
								                              	<input type="submit" value="บล็อค" class="btn btn-success btn-sm">
								                              	@else
								                              	<a href="{{url('master/block')}}/{{$value->id}}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการปลดบล็อกผู้ใช้งานใช่หรือไม่ ?')">ปลดบล็อก</a>
								                              	@endif
								                              	</form>
                              									{{csrf_field()}}
                                                        </div>
                                                    </td>
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
<script>
function myFunction(e) {
    var txt;
    var person = prompt("กรอกหมายเหตุ:", "");
    if (person == null || person == "") {
        txt = "";
    } else {
        txt = " " + person + "";
    }

    document.getElementById("myText"+e).value = txt;
}
</script>