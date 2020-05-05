@extends("temp-admin")
@section("content")
<br>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading" style="color: #2B3282">
                    ข้อเสนอแนะ 
				</div>
				<div class="panel-body">					
					@foreach($comments as $comment => $value)
					<div class="row">	
						<div class="col-md-4">
						<strong>สาขาที่ใช้บริการ</strong>
						<p>{{$value->branch_comment}}</p>
						<strong>วันที่ใช้บริการ</strong>
						<p>{{$value->date}}</p>
						</div>
						<div class="col-md-8">
						<strong>ข้อเสนอแนะ</strong><br>	
							<p>{{$value->comment}}</p><br>
						</div>
					</div><hr>
					@endforeach
				</div>
				<div class="panel-footer">
                <div class="row">
                   <div class="col-md-8"></div>
                    <div class="col-md-4">
                      {{$comments->links()}}
                    </div>
                </div>
              </div>
			</div>
		</div>	
		<div class="col-md-2"></div>
	</div>
</div>
@endsection