@extends("template")

@section("content")
<div class="page-wrapper">
    @include("/master/master_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include("/master/master_navbar_desktop")
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-data m-b-10">
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>ขนาด</td>
                                                    <td>รุ่น</td>
                                                    <td>ราคาต้นทุน</td>
                                                    <td>จำนวน</td>
                                                    <td>ปีที่ผลิต</td>
                                                    @if(Auth::user()->role == "1")
                                                    <td>โปรโมชั่น</td>
                                                    @endif
                                                    <td>หมายเหตุ</td>
                                                    <td></td>
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
                                                            <h6>{{$value->cost}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->amount}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value->year}}</h6>
                                                        </div>
                                                    </td>
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
                                                    <td>
                                                        <a href="{{url('/master/bypart/edit/')}}/{{$value->id}}">
                                                            <i class="fa fa-pencil-square" style="color:blue;"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                        <!-- <button type="submit" onclick="return confirm('Are you sure to delete ?')">
                                                            <i class="fas fa-trash" style="color:red;"></i>
                                                        </button> -->
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
</div>
@endsection