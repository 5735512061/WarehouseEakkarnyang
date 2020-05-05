@extends("temp-admin")
<script type="text/javascript" src="{{asset('js/filter-product.js')}}"></script>
@section("content")
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-printme.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#example3").click(function(){
            $("#dataexample3").printMe({
                "path" : ["../css/example.css"],
                "title" : "ข้อมูลลูกค้า"
            });
        });
    });
</script>
<br>
     <div class="container main">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                              <a href="{{url('/benefit/customer')}}" class="btn btn-primary">เพิ่มข้อมูลลูกค้า</a>
                            </div>
                            <div class="col-md-10">
                            <form action="{{url('/admin/search')}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
                                <div class="col-md-2 text-right">
                                    <select name="year" id="year" onchange="getyear(this)" class="form-control" style="height: calc(2.6rem + 3px)">
                                        <option>ปี</option>
                                        <option value="2018">2018</option>  
                                        <option value="2019">2019</option>  
                                        <option value="2020">2020</option>  
                                        <option value="2021">2021</option>  
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <select name="month" id="month" onchange="getmonth(this)" class="form-control" style="height: calc(2.6rem + 3px)"> 
                                        <option>เดือน</option>  
                                        <option value="01">มกราคม</option>  
                                        <option value="02">กุมภาพันธ์</option>  
                                        <option value="03">มีนาคม</option>  
                                        <option value="04">เมษายน</option>  
                                        <option value="05">พฤษภาคม</option>  
                                        <option value="06">มิถุนายน</option>  
                                        <option value="07">กรกฎาคม</option>  
                                        <option value="08">สิงหาคม</option>  
                                        <option value="09">กันยายน</option>  
                                        <option value="10">ตุลาคม</option>  
                                        <option value="11">พฤศจิกายน</option>  
                                        <option value="12">ธันวาคม</option>  
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </form>
                                <div class="col-md-5 text-right">
                                    <div class="col-md-6">
                                        <input type="search" class="light-table-filter" data-table="order-table" placeholder="ค้นหาข้อมูลลูกค้า">
                                    </div>
                                    <div class="col-md-6">
                                    <button id="example3" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-print"></span>
                                    </button>
                                    </div>
                                    <!-- <a href="{{url('ExportExcel')}}"  class="btn btn-sm btn-primary">
                                    <span class="glyphicon glyphicon-export"></span> Excel
                                    </a> -->
                                </div> 
                            </div>
                       </div>
                    </div>
                    <div class="panel-body">
                    {{$customers->links()}}
                    <div id="dataexample3">
                        <table class="table table-striped table-bordered table-list order-table">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>หมายเลขสมาชิก</th>
                                    <th>ป้ายทะเบียนรถ</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>เบอร์โทรติดต่อ</th>
                                    <th>วันออกบัตร</th>
                                    <th>ข้อมูลเพิ่มเติม</th>
                                    <th>ประวัติการใช้บริการ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($customers as $customer => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $customer+1}}</td>
                                    <td>{{$value->serialnumber}}</td>
                                    <td>{{$value->carnumber}} {{$value->carprovince}}</td>
                                    <td>{{$value->name}} {{$value->surname}}</td>
                                    <td>{{$value->tel}}</td>
                                    <td>{{$value->date}}</td>
                                    <td>
                                        <center>
                                            <a href="{{url('detailcustomer/')}}/{{$value->id}}">
                                                <i class="fa fa-folder-open-o" style="color:blue;"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="{{url('history/')}}/{{$value->id}}">
                                                <i class="fa fa-folder-open-o" style="color:blue;"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="{{url('customer/edit/')}}/{{$value->id}}">
                                                <i class="fa fa-pencil-square" style="color:blue;"></i>
                                            </a>
                                        </center>
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function getyear(selectyear) {
    var value = selectyear.value;  
    console.log(value);
}

function getmonth(selectmonth) {
    var value = selectmonth.value;  
    console.log(value);
}
</script>



   