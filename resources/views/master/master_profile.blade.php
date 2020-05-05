@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/master/master_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <form enctype="multipart/form-data" action="{{url('/master/profile')}}" method="POST">
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
                                                                @if ($errors->has('master_name'))
                                                                <span class="text-danger">({{ $errors->first('master_name') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="master_name" value="{{Auth::user()->master_name}}" type="text" disabled="disablaed">
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
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