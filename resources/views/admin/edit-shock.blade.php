@extends("temp-admin")

<style>
	.p {
		color: #000;
		font-size: 1.4rem;
	}
	.red {
		color: red;
		font-size: 1.2rem;
	}
</style>
@section("content")
<br>
<div class="container">
<form action="{{url('/admin/updateshock')}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading" style="color: #2B3282">แก้ไขข้อมูลโช้ค</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
							<input type="hidden" name="shock_id" value="{{$shock->shock_id}}">
		                        <div class="form-group">
		                        	<input type="text" class="form-control" name="category" value="โช้ค" readonly>
		                            <select name="subcategory" class="form-control" style="height: calc(3rem + 2px)"> 
		                            	<option>{{$shock->subcategory}}</option>
		                            @foreach($subcategories as $subcategory)
		                                <option>{{$subcategory->name}}</option>
		                            @endforeach
		                            </select>
		                        </div>
		                        	@if ($errors->has('model'))
              							<span class="text-danger">({{ $errors->first('model') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="model" value="{{$shock->model}}">
		                        	@if ($errors->has('price'))
              							<span class="text-danger">({{ $errors->first('price') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="price" value="{{$shock->price}}">
		                        	@if ($errors->has('promotion'))
              							<span class="text-danger">({{ $errors->first('promotion') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="promotion" value="{{$shock->promotion}}">
		                        	@if (Auth::user()->id==1)
		                        	<input type="file" class="form-control" name="image" style="height: calc(3rem + 2px)">
		                        	@endif<br>
		                        	@if ($errors->has('detail'))
              							<span class="text-danger">({{ $errors->first('detail') }})</span>
           							@endif
		                        	<textarea name="detail" class="form-control" rows="5"><?php echo $shock['detail'] ?></textarea><br>
		                        	<button type="submit" class="btn btn-success btn-lg"><h4>อัพเดตสินค้า</h4></button>
		      				</div>
		      			</div>
		      			<div class="col-md-2"></div>
				</div><br>
			</div>	
		</div>
		<div class="col-md-3"></div>
	</div>
</form>
</div>

<script>
$(document).ready(function(){
    $("form").submit(function(){
        alert("อัพเดตข้อมูลสินค้าสำเร็จ");
    });
});
</script>

@endsection