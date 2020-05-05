@extends("template")

@section("content")
	@include("/customer/customer_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        	@include("/customer/customer_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="row" style="margin-left: 20px; margin-bottom: 5px;">
                    <div class="col-md-3">
                        <div class="alert alert-primary" role="alert">
                            คลังสินค้าสาขาบายพาส
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form class="form-header" action="{{url('/customer/bypart/search')}}" method="POST">{{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="ค้นหาสินค้า" autocomplete="off" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" style="margin-left: 40px; margin-bottom: 20px;">
                    <input type="hidden" value="check" name="check">
                        <div style="color: #ffffff;">
                            <input type="checkbox" id="check_have_product"  onclick="func_Check_have_product()"> แสดงเฉพาะสินค้าที่มี
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ยี่ห้อ</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    <td>โปรโมชั่น</td>
                                                </tr>
                                            </thead>
                                            @foreach($searchs as $search => $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$NUM_PAGE*($page-1) + $search+1}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->category}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->size}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->model}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            @if($value->category == "OTANI")
                                                                <?php 
                                                                    $balance = str_replace(',','',$value->cost); 
                                                                    $balance = floatval($balance) - (0.1 * floatval($balance));
                                                                    $balance = number_format($balance);
                                                                ?>
                                                            {{-- <h6>{{$value->cost}}</h6> --}}
                                                            <h6>{{$balance}}</h6>
                                                            @else
                                                            <h6>{{$value->cost}}</h6>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>
                                                            @if($value->amount == 0)
                                                                <div class="dont_have_amount" style="color: red;">หมด</div>
                                                            @else
                                                                <div class="col-sm-1 have_amount">
                                                                    {{$value->amount}}
                                                                </div> 
                                                            @endif
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    @if($value->year == "2018")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: red;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @elseif($value->year == "2019")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 style="color: #1fb141;">{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
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
            </div>
        </div>
<script>
    function func_Check_have_product() {
          // Get the checkbox
          var checkBox = document.getElementById("check_have_product");

          // If the checkbox is checked, display the output text
          if (checkBox.checked == true){
            $.each($('.dont_have_amount'), function(index, val) {
                $(val).parents('tr')[0].style.display = "none"
            });
          } else {
                $.each($('.dont_have_amount'), function(index, val) {
                $(val).parents('tr')[0].style.display = "table-row"
            });
          }
        }
</script>
@endsection