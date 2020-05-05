@extends("template")

@section("content")
    @include("/master/master_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="row" style="margin-left: 20px; margin-bottom: 5px;">
                    <div class="col-md-3">
                        <div class="alert alert-primary" role="alert">
                            คลังสินค้าสาขาโคกกลอย
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form class="form-header" action="{{url('/master/khokkloi/search')}}" method="POST">{{ csrf_field() }}
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
                    <div class="section__content section__content--p20">
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
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    @if(Auth::user()->role == "1" || Auth::user()->role == "2")
                                                    <td></td>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <form  method="POST" role="form">
                                            {{ csrf_field() }}
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
                                                            @if(Auth::user()->role == "1")
                                                                @if($value->amount == 0)
                                                                <div class="flex-container">
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}">
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <div class="dont_have_amount" style="color: red;">หมด</div>
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#add" data-id="{{$value->id}}"><i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="flex-container">
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}"><i class="fa fa-minus-circle" style="color:red;"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-sm-1 have_amount">
                                                                        {{$value->amount}}
                                                                    </div> 
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#add" data-id="{{$value->id}}"><i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @elseif(Auth::user()->role == "3")
                                                                @if($value->amount == 0)
                                                                    <div class="dont_have_amount" style="color: red;">หมด</div>
                                                                @else
                                                                    <div class="col-sm-1 have_amount">
                                                                        {{$value->amount}}
                                                                    </div>
                                                                @endif
                                                            @else
                                                                @if($value->amount == 0)
                                                                <div class="flex-container">
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}">
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <div class="dont_have_amount" style="color: red;">หมด</div>
                                                                    </div>
                                                                    <div class="col-sm-1"> 
                                                                        <button type="button" data-toggle="modal" data-target="#add" data-id="{{$value->id}}"><i class="fa fa-plus-circle" style="color:blue;"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="flex-container">
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}"><i class="fa fa-minus-circle" style="color:red;"></i></button>
                                                                    </div>
                                                                    <div class="col-sm-1 have_amount">
                                                                        {{$value->amount}}
                                                                    </div> 
                                                                    <div class="col-sm-1">
                                                                        <button type="button" data-toggle="modal" data-target="#add" data-id="{{$value->id}}"><i class="fa fa-plus-circle" style="color:blue;"></i></button>
                                                                    </div>
                                                                @endif
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
                                                    @if(Auth::user()->role == "1")
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->promotion}}</h6>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->comment}}</h6>
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->role == "1" || Auth::user()->role == "2")
                                                    <td>
                                                        <a href="{{url('/master/khokkloi/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <button formaction="{{url('/master/khokkloi/tyredelete/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                                        <i class="fa fa-trash" style="color:red;"></i></button>{{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                    </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                            @endforeach
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            </div>
                            </div>
                            <!-- modal delete -->                            
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>ลบจำนวนสินค้า</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{url('/master/khokkloi/delete-tyre')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
                                        <div class="modal-body">
                                            <input type="text" class="form-control" style="height: calc(1.5rem)" name="amount" placeholder="จำนวนสินค้าที่ต้องการลบ">
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal delete -->
                            <!-- modal add -->
                            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>เพิ่มจำนวนสินค้า</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{url('/master/khokkloi/add-tyre')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
                                        <div class="modal-body">
                                            <input type="text" class="form-control" style="height: calc(1.5rem)" name="amount" placeholder="จำนวนสินค้าที่ต้องการเพิ่ม">
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary btn-sm">เพิ่ม</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal add -->
                        </div>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script>
    $( document ).ready(function() {

        $('#add').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')

            var modal = $(this)

            modal.find('.modal-body input[name="id"]').val(id)
        })
    });
</script> 

<script>
    $( document ).ready(function() {

        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')

            var modal = $(this)

            modal.find('.modal-body input[name="id"]').val(id)
        })
    });

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
