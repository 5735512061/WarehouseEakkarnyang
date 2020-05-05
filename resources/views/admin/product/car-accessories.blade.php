@extends("temp-admin")
<script type="text/javascript" src="{{asset('js/filter-product.js')}}"></script>

@section("content")
<br>
<div class="container">
<form action="{{url('/accessoryaction')}}" method="POST" role="form">
{{ csrf_field() }}
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="panel-title">ชิ้นส่วนและอะไหล่รถยนต์</h3>
                  </div>
                  <div class="col-md-6">
                    <input type="search" class="light-table-filter" data-table="order-table" placeholder="ค้นหาชิ้นส่วนและอะไหล่รถยนต์">
                    @if (Auth::user()->id==1)
                    <a href="{{url('/admin/insert-product')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มสินค้า</a>
                    @endif
                    <button type="submit" name="delete" value="delete" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete ?')">
                    <span class="glyphicon glyphicon-trash"></span> ลบ</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list order-table table table-responsive">
                  <thead>
                    <tr>
                        <th>
                          <!-- <input type="checkbox" id="all" class="parent" data-group=".group"> -->
                          <span class="glyphicon glyphicon-trash"></span>
                        </th>
                        <th>#</th>
                        <th>ยี่ห้อ</th>
                        <th>รุ่น</th>
                        <th>ขนาด</th>
                        <th>ราคา</th>
                        <th>รายละเอียด</th>
                        <th>แก้ไข</th>
                    </tr> 
                  </thead>
                    @foreach($accessories as $accessory => $value)
                    <tbody>
                        <tr>
                          <td>
                            <input type="hidden" name="{{$value->accessory_id}}">
                            <input type="checkbox" class="group" id="{{$value->accessory_id}}" name="checkbox[]" value="{{$value->accessory_id}}">
                          </td>
                          <td>{{$NUM_PAGE*($page-1) + $accessory+1}}</td>
                          <td>{{$value->subcategory}}</td>
                          <td>{{$value->model}}</td>
                          <td>{{$value->size}}</td>
                          <td>{{$value->price}}</td>
                          <td>{{$value->detail}}</td>
                          <td><a href="{{url('admin/editaccessory/')}}/{{$value->accessory_id}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
              </div>
              <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8">
                    </div>
                </div>
              </div>
      </div>
      </div>
    </div>
</form>
</div>

@endsection