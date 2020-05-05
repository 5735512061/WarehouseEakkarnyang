@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/customer/customer_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/customer/customer_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <form enctype="multipart/form-data" action="{{url('/customer/profile')}}" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">อัปโหลดรูปโปรไฟล์</div>
                                        <ul class="list-group list-group-flush">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                        <img src="{{url('images')}}/{{Auth::user()->image}}">
                                                        <input type="file" name="image" style="margin-top: 10px;"> 
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                          {{ csrf_field() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card" >
                                    <div class="card-header">แก้ไขข้อมูลส่วนตัว</div>
                                        <ul class="list-group list-group-flush">
                                            <div class="container">
                                                <div class="row" style="margin-left: 40px; margin-top: 20px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>ชื่อบัญชี
                                                                @if ($errors->has('customer_name'))
                                                                <span class="text-danger">({{ $errors->first('customer_name') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="customer_name" value="{{Auth::user()->customer_name}}" type="text" disabled="disabled">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>ที่อยู่
                                                                @if ($errors->has('address'))
                                                                <span class="text-danger">({{ $errors->first('address') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="address" value="{{Auth::user()->address}}" type="text">
                                                        </div> --> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- <div class="form-group">
                                                            <label>อีเมลเข้าใช้งานระบบ
                                                                @if ($errors->has('email'))
                                                                <span class="text-danger">({{ $errors->first('email') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="email" value="{{Auth::user()->email}}" type="text">
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label>เบอร์โทรศัพท์
                                                                @if ($errors->has('tel'))
                                                                <span class="text-danger">({{ $errors->first('tel') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="tel" value="{{Auth::user()->tel}}" type="text">
                                                        </div>
                                                        <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}">
                                                    </div>
                                                </div>
                                                <div align="right" style="margin-bottom: 20px;">
                                                    <button type="submit" class="btn btn-warning">อัพเดตข้อมูล</button>
                                                </div>
                                            </div>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection