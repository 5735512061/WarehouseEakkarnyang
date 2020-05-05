@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/admin/admin_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/admin/admin_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <form enctype="multipart/form-data" action="{{url('/admin/profile')}}" method="POST">
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
                                                                @if ($errors->has('admin_name'))
                                                                <span class="text-danger">({{ $errors->first('admin_name') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="admin_name" value="{{Auth::user()->admin_name}}" type="text" disabled="disabled">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>สาขา
                                                                @if ($errors->has('branch'))
                                                                <span class="text-danger">({{ $errors->first('branch') }})</span>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" name="branch" value="{{Auth::user()->branch}}" type="text">
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