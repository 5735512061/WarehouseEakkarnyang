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
<form action="{{url('/admin/insert-product')}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				@if (Auth::user()->id=="1")
				<div class="panel-heading" style="color: #2B3282">เพิ่มข้อมูลสินค้า</div>
				@endif
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
		        				<div class="form-group">
		        					@if ($errors->has('category'))
              							<span class="text-danger">({{ $errors->first('category') }})</span>
           							@endif
		                            <select name="category" id="category" class="form-control" style="height: calc(3rem + 2px)"> 
		                                <option>เลือกประเภทสินค้า</option>
		                                @foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
		                                @endforeach
		                            </select>
		                            <div class="divInactive">
			                            <input  id="spninactive_ยางรถยนต์" style="display:none;" type="text" class="form-control" name="width" placeholder="ความกว้าง">
			                            <input  id="spninactive_ยางรถยนต์" style="display:none;" type="text" class="form-control" name="ratio" placeholder="อัตราส่วน">
			                            <input  id="spninactive_ยางรถยนต์" style="display:none;" type="text" class="form-control" name="diameter" placeholder="เส้นผ่านศูนย์กลาง">
			                            <input  id="spninactive_แม็กซ์" style="display:none;" type="text" class="form-control" name="size" placeholder="ขนาดแม็กซ์">
			                            <input  id="spninactive_แม็กซ์" style="display:none;" type="text" class="form-control" name="pcd" placeholder="PCD">
			                            <input  id="spninactive_เบรก" style="display:none;" type="text" class="form-control" name="cabrand" placeholder="ยี่ห้อรถ">
			                            <input  id="spninactive_เบรก" style="display:none;" type="text" class="form-control" name="carmodel" placeholder="รุ่นรถ">
			                            <input  id="spninactive_เบรก" style="display:none;" type="text" class="form-control" name="cayear" placeholder="ปีที่ผลิต">
			                            <input  id="spninactive_แบตเตอรี่" style="display:none;" type="text" class="form-control" name="cbrand" placeholder="ยี่ห้อรถ">
			                            <input  id="spninactive_แบตเตอรี่" style="display:none;" type="text" class="form-control" name="camodel" placeholder="รุ่นรถ">
			                            <input  id="spninactive_แบตเตอรี่" style="display:none;" type="text" class="form-control" name="cyear" placeholder="ปีที่ผลิต">
			                            <input  id="spninactive_น้ำมันเครื่อง" style="display:none;" type="text" class="form-control" name="brand" placeholder="ยี่ห้อรถ">
			                            <input  id="spninactive_น้ำมันเครื่อง" style="display:none;" type="text" class="form-control" name="cmodel" placeholder="รุ่นรถ">
			                            <input  id="spninactive_น้ำมันเครื่อง" style="display:none;" type="text" class="form-control" name="year" placeholder="ปีที่ผลิต">
			                            <input  id="spninactive_น้ำมันเครื่อง" style="display:none;" type="text" class="form-control" name="size" placeholder="ขนาด">
			                            <input  id="spninactive_น้ำมันเครื่อง" style="display:none;" type="text" class="form-control" name="total_price" placeholder="ราคารวม">
			                            <textarea id="spninactive_น้ำมันเครื่อง" style="display:none;" name="moredetail" class="form-control" rows="5" " placeholder="รายละเอียดเพิ่มเติม"></textarea>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                        	@if ($errors->has('subcategory'))
              							<span class="text-danger">({{ $errors->first('subcategory') }})</span>
           							@endif
		                            <select name="subcategory" id="subcategory" class="form-control" style="height: calc(3rem + 2px)"> 
		                                <option>เลือกยี่ห้อสินค้า</option>
		                            </select>
		                        </div>
		                        <div class="divInactive">
		                        	<input  id="spninactive_ชิ้นส่วนและอะไหล่รถยนต์" style="display:none;" type="text" class="form-control" name="size" placeholder="ขนาดใบปัดน้ำฝน">
								</div>
		                        	@if ($errors->has('model'))
              							<span class="text-danger">({{ $errors->first('model') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="model" placeholder="รุ่น">
		                        	@if ($errors->has('price'))
              							<span class="text-danger">({{ $errors->first('price') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="price" placeholder="ราคา">
		                        	@if ($errors->has('promotion'))
              							<span class="text-danger">({{ $errors->first('promotion') }})</span>
           							@endif
		                        	<input type="text" class="form-control" name="promotion" placeholder="โปรโมชั่น">
		                        <!-- <div class="p">รูปภาพ :</div> -->
		                        	@if ($errors->has('image'))
              							<span class="text-danger">({{ $errors->first('image') }})</span>
           							@endif
		                        	<input type="file" class="form-control" name="image" style="height: calc(3rem + 2px)"><br>
		                        	@if ($errors->has('detail'))
              							<span class="text-danger">({{ $errors->first('detail') }})</span>
           							@endif
		                        	<textarea name="detail" class="form-control" rows="5" " placeholder="รายละเอียดอื่น ๆ"></textarea><br>
		                        	<button type="submit" class="btn btn-info btn-xs">เพิ่มสินค้า</button>
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
        alert("เพิ่มข้อมูลสินค้าสำเร็จ");
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#category').on('change',function(e){
		$(".divInactive input").hide()  
  		var str =  $(this).find('option:selected').html()
  			console.log(str);  
   		var ele = $("#spninactive_"+str)
   			if(ele){     
     			ele.show();    
     		console.log("(present in divInactive")
  		}

	console.log(e);
	var cat_id = e.target.value;
		//ajax
		$.get('../ajax-subcat?cat_id=' + cat_id,function(data){
			$('#subcategory').empty();
			$.each(data, function(index, subcatObj){
				$('#subcategory').append('<option value="'+subcatObj.name+'">'+subcatObj.name+'</option>');
			});
		});
	});
});
</script>

@endsection