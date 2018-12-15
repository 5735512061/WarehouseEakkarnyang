@extends("template")

@section("content")
<div class="page-wrapper">
	@include("/master/master_navbar_mobile")
		<!-- PAGE CONTAINER-->
        <div class="page-container">
			 @include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
            	<form action="{{url('/master/create-admin')}}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
				<div class="container">
					<div class="card" >
					    <div class="card-header">
					    	ลงทะเบียนผู้ใช้งาน
					    </div>
					    <ul class="list-group list-group-flush">
					    	<div class="container">
					    		<div class="row">
					        		<div class="col-md-1"></div>
					      			<div class="col-md-5"><br>
							          	<p>
							            	<label>ชื่อผู้ดูแลระบบ
												@if ($errors->has('admin_name'))
												<span class="text-danger">({{ $errors->first('admin_name') }})</span>
												@endif
											</label>
							            	<input class="form-control" name="admin_name" value="{{old ('admin_name')}}" type="text">
							          	</p>

							            <p>
							            	<label>เบอร์โทรศัพท์
												@if ($errors->has('tel'))
												<span class="text-danger">({{ $errors->first('tel') }})</span>
												@endif
											</label>
							            	<input class="form-control" name="tel" value="{{old ('tel')}}" type="text">
							            </p>

							          	<p>
							                <label>สาขา
												@if ($errors->has('branch'))
								 				<span class="text-danger">({{ $errors->first('branch') }})</span>
								 				@endif
											</label>
							               <input class="form-control" name="branch" value="{{old ('branch')}}" type="text" >
							          	</p>

							          	<p>
							                <label>บทบาท
												@if ($errors->has('role'))
								 				<span class="text-danger">({{ $errors->first('role') }})</span>
								 				@endif
											</label>
							               <input class="form-control" name="role" value="{{old ('role')}}" type="text" >
							          	</p>

					        		</div>

					      			<div class="col-md-5"><br>
					        		<p>
					            		<label>รหัสผ่าน
											@if ($errors->has('password'))
											<span class="text-danger">({{ $errors->first('password') }})</span>
											@endif
										</label>
					            		<input class="form-control" name="password" type="password">
					        		</p>

					        		<p>
					          			<label>ที่อยู่
											@if ($errors->has('address'))
											<span class="text-danger">({{ $errors->first('address') }})</span>
											@endif
										</label>
					          			<input class="form-control" name="address" value="{{old ('address')}}" type="text" >
					        		</p>

					        		<p>
						               		<label>สถานะ</label>
												<select class="form-control" name="status">
						               				<option>1</option>
													<option>0</option>
												</select>
						          		</p>

					        		<input type="hidden" class="form-control" name="master_id" value="{{Auth::user()->id}}">
					        		<input type="hidden" class="form-control" name="image" value="profile.jpg">
					      			</div>
					        		<div class="col-md-1"></div>
					          	</div>

					        	<div class="row">
					            	<div class="col-md-6"></div>
					            	<div class="col-md-5">
					            		<div align="right" style="margin-top: 10px; margin-bottom: 20px;">
					            			<button type="submit" class="btn btn-info">Save</button>
					            		</div>
					            	</div>
					            	<div class="col-md-1"></div>
					        	</div>
					    	</div>
					    </ul>
					</div>
				</div>
				</form>
            </div>
        </div>
</div>
@endsection