@extends("template")

@section("content")
	@include("/customer/customer_navbar_mobile")  
        <!-- PAGE CONTAINER-->
        <div class="page-container" style="font-family: 'Noto Sans Thai', sans-serif;">
        	{{-- @include("/customer/customer_navbar_desktop") --}}
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <center><h2 style="color: #fff;">สรุปจำนวนสต๊อก เอกการยางทุกสาขา</h2></center><br>
                @php
                    // คลังสินค้าหลัก
                    $main_amount_michelin = DB::table('tyre_stock_mains')->where('category','MICHELIN')->sum('amount');
                    $main_amount_bfg = DB::table('tyre_stock_mains')->where('category','BF Goodrich')->sum('amount');
                    $main_amount_otani = DB::table('tyre_stock_mains')->where('category','OTANI')->sum('amount');
                    $main_amount_maxxis = DB::table('tyre_stock_mains')->where('category','MAXXIS')->sum('amount');
                    $main_amount_yoko = DB::table('tyre_stock_mains')->where('category','YOKOHAMA')->sum('amount');
                    $main_amount_brid = DB::table('tyre_stock_mains')->where('category','BRIDGESTONE')->sum('amount');
                    $main_amount_toyo = DB::table('tyre_stock_mains')->where('category','TOYO')->sum('amount');
                    $main_amount_nitto = DB::table('tyre_stock_mains')->where('category','NITTO')->sum('amount');
                    $main_amount_goodyear = DB::table('tyre_stock_mains')->where('category','GOODYEAR')->sum('amount');
                    $main_amount_raiden = DB::table('tyre_stock_mains')->where('category','RAIDEN')->sum('amount');
                    $main_amount_other = DB::table('tyre_stock_mains')->where('category','อื่นๆ')->sum('amount');

                    // สาขาโคกกลอย
                    $khokkloi_amount_michelin = DB::table('tyreproducts')->where('category','MICHELIN')->sum('amount');
                    $khokkloi_amount_bfg = DB::table('tyreproducts')->where('category','BF Goodrich')->sum('amount');
                    $khokkloi_amount_otani = DB::table('tyreproducts')->where('category','OTANI')->sum('amount');
                    $khokkloi_amount_maxxis = DB::table('tyreproducts')->where('category','MAXXIS')->sum('amount');
                    $khokkloi_amount_yoko = DB::table('tyreproducts')->where('category','YOKOHAMA')->sum('amount');
                    $khokkloi_amount_brid = DB::table('tyreproducts')->where('category','BRIDGESTONE')->sum('amount');
                    $khokkloi_amount_toyo = DB::table('tyreproducts')->where('category','TOYO')->sum('amount');
                    $khokkloi_amount_nitto = DB::table('tyreproducts')->where('category','NITTO')->sum('amount');
                    $khokkloi_amount_goodyear = DB::table('tyreproducts')->where('category','GOODYEAR')->sum('amount');
                    $khokkloi_amount_raiden = DB::table('tyreproducts')->where('category','RAIDEN')->sum('amount');
                    $khokkloi_amount_other = DB::table('tyreproducts')->where('category','อื่นๆ')->sum('amount');

                    // สาขาเมืองพังงา
                    $phang_amount_michelin = DB::table('tyrephangngas')->where('category','MICHELIN')->sum('amount');
                    $phang_amount_bfg = DB::table('tyrephangngas')->where('category','BF Goodrich')->sum('amount');
                    $phang_amount_otani = DB::table('tyrephangngas')->where('category','OTANI')->sum('amount');
                    $phang_amount_maxxis = DB::table('tyrephangngas')->where('category','MAXXIS')->sum('amount');
                    $phang_amount_yoko = DB::table('tyrephangngas')->where('category','YOKOHAMA')->sum('amount');
                    $phang_amount_brid = DB::table('tyrephangngas')->where('category','BRIDGESTONE')->sum('amount');
                    $phang_amount_toyo = DB::table('tyrephangngas')->where('category','TOYO')->sum('amount');
                    $phang_amount_nitto = DB::table('tyrephangngas')->where('category','NITTO')->sum('amount');
                    $phang_amount_goodyear = DB::table('tyrephangngas')->where('category','GOODYEAR')->sum('amount');
                    $phang_amount_raiden = DB::table('tyrephangngas')->where('category','RAIDEN')->sum('amount');
                    $phang_amount_other = DB::table('tyrephangngas')->where('category','อื่นๆ')->sum('amount');

                    // สาขาถลาง
                    $thalang_amount_michelin = DB::table('tyrethalangs')->where('category','MICHELIN')->sum('amount');
                    $thalang_amount_bfg = DB::table('tyrethalangs')->where('category','BF Goodrich')->sum('amount');
                    $thalang_amount_otani = DB::table('tyrethalangs')->where('category','OTANI')->sum('amount');
                    $thalang_amount_maxxis = DB::table('tyrethalangs')->where('category','MAXXIS')->sum('amount');
                    $thalang_amount_yoko = DB::table('tyrethalangs')->where('category','YOKOHAMA')->sum('amount');
                    $thalang_amount_brid = DB::table('tyrethalangs')->where('category','BRIDGESTONE')->sum('amount');
                    $thalang_amount_toyo = DB::table('tyrethalangs')->where('category','TOYO')->sum('amount');
                    $thalang_amount_nitto = DB::table('tyrethalangs')->where('category','NITTO')->sum('amount');
                    $thalang_amount_goodyear = DB::table('tyrethalangs')->where('category','GOODYEAR')->sum('amount');
                    $thalang_amount_raiden = DB::table('tyrethalangs')->where('category','RAIDEN')->sum('amount');
                    $thalang_amount_other = DB::table('tyrethalangs')->where('category','อื่นๆ')->sum('amount');

                    // สาขาไทวัสดุ
                    $thaiwat_amount_michelin = DB::table('tyrethaiwatsadus')->where('category','MICHELIN')->sum('amount');
                    $thaiwat_amount_bfg = DB::table('tyrethaiwatsadus')->where('category','BF Goodrich')->sum('amount');
                    $thaiwat_amount_otani = DB::table('tyrethaiwatsadus')->where('category','OTANI')->sum('amount');
                    $thaiwat_amount_maxxis = DB::table('tyrethaiwatsadus')->where('category','MAXXIS')->sum('amount');
                    $thaiwat_amount_yoko = DB::table('tyrethaiwatsadus')->where('category','YOKOHAMA')->sum('amount');
                    $thaiwat_amount_brid = DB::table('tyrethaiwatsadus')->where('category','BRIDGESTONE')->sum('amount');
                    $thaiwat_amount_toyo = DB::table('tyrethaiwatsadus')->where('category','TOYO')->sum('amount');
                    $thaiwat_amount_nitto = DB::table('tyrethaiwatsadus')->where('category','NITTO')->sum('amount');
                    $thaiwat_amount_goodyear = DB::table('tyrethaiwatsadus')->where('category','GOODYEAR')->sum('amount');
                    $thaiwat_amount_raiden = DB::table('tyrethaiwatsadus')->where('category','RAIDEN')->sum('amount');
                    $thaiwat_amount_other = DB::table('tyrethaiwatsadus')->where('category','อื่นๆ')->sum('amount');

                    // สาขาบายพาส
                    $bypass_amount_michelin = DB::table('tyrebyparts')->where('category','MICHELIN')->sum('amount');
                    $bypass_amount_bfg = DB::table('tyrebyparts')->where('category','BF Goodrich')->sum('amount');
                    $bypass_amount_otani = DB::table('tyrebyparts')->where('category','OTANI')->sum('amount');
                    $bypass_amount_maxxis = DB::table('tyrebyparts')->where('category','MAXXIS')->sum('amount');
                    $bypass_amount_yoko = DB::table('tyrebyparts')->where('category','YOKOHAMA')->sum('amount');
                    $bypass_amount_brid = DB::table('tyrebyparts')->where('category','BRIDGESTONE')->sum('amount');
                    $bypass_amount_toyo = DB::table('tyrebyparts')->where('category','TOYO')->sum('amount');
                    $bypass_amount_nitto = DB::table('tyrebyparts')->where('category','NITTO')->sum('amount');
                    $bypass_amount_goodyear = DB::table('tyrebyparts')->where('category','GOODYEAR')->sum('amount');
                    $bypass_amount_raiden = DB::table('tyrebyparts')->where('category','RAIDEN')->sum('amount');
                    $bypass_amount_other = DB::table('tyrebyparts')->where('category','อื่นๆ')->sum('amount');

                    // สาขาเจ้าฟ้า
                    $chaofa_amount_michelin = DB::table('tyrechaofas')->where('category','MICHELIN')->sum('amount');
                    $chaofa_amount_bfg = DB::table('tyrechaofas')->where('category','BF Goodrich')->sum('amount');
                    $chaofa_amount_otani = DB::table('tyrechaofas')->where('category','OTANI')->sum('amount');
                    $chaofa_amount_maxxis = DB::table('tyrechaofas')->where('category','MAXXIS')->sum('amount');
                    $chaofa_amount_yoko = DB::table('tyrechaofas')->where('category','YOKOHAMA')->sum('amount');
                    $chaofa_amount_brid = DB::table('tyrechaofas')->where('category','BRIDGESTONE')->sum('amount');
                    $chaofa_amount_toyo = DB::table('tyrechaofas')->where('category','TOYO')->sum('amount');
                    $chaofa_amount_nitto = DB::table('tyrechaofas')->where('category','NITTO')->sum('amount');
                    $chaofa_amount_goodyear = DB::table('tyrechaofas')->where('category','GOODYEAR')->sum('amount');
                    $chaofa_amount_raiden = DB::table('tyrechaofas')->where('category','RAIDEN')->sum('amount');
                    $chaofa_amount_other = DB::table('tyrechaofas')->where('category','อื่นๆ')->sum('amount');

                    // จำนวนที่มีในสต๊อกแต่ละสาขา
                    $sum_main = $main_amount_michelin + $main_amount_bfg + $main_amount_otani + $main_amount_maxxis + $main_amount_yoko + $main_amount_brid
                            + $main_amount_toyo + $main_amount_nitto + $main_amount_goodyear + $main_amount_raiden + $main_amount_other;

                    $sum_khokkloi = $khokkloi_amount_michelin + $khokkloi_amount_bfg + $khokkloi_amount_otani + $khokkloi_amount_maxxis + $khokkloi_amount_yoko + $khokkloi_amount_brid
                            + $khokkloi_amount_toyo + $khokkloi_amount_nitto + $khokkloi_amount_goodyear + $khokkloi_amount_raiden + $khokkloi_amount_other;

                    $sum_phang = $phang_amount_michelin + $phang_amount_bfg + $phang_amount_otani + $phang_amount_maxxis + $phang_amount_yoko + $phang_amount_brid
                            + $phang_amount_toyo + $phang_amount_nitto + $phang_amount_goodyear + $phang_amount_raiden + $phang_amount_other;

                    $sum_thalang = $thalang_amount_michelin + $thalang_amount_bfg + $thalang_amount_otani + $thalang_amount_maxxis + $thalang_amount_yoko + $thalang_amount_brid
                            + $thalang_amount_toyo + $thalang_amount_nitto + $thalang_amount_goodyear + $thalang_amount_raiden + $thalang_amount_other;

                    $sum_thaiwat = $thaiwat_amount_michelin + $thaiwat_amount_bfg + $thaiwat_amount_otani + $thaiwat_amount_maxxis + $thaiwat_amount_yoko + $thaiwat_amount_brid
                            + $thaiwat_amount_toyo + $thaiwat_amount_nitto + $thaiwat_amount_goodyear + $thaiwat_amount_raiden + $thaiwat_amount_other;

                    $sum_bypass = $bypass_amount_michelin + $bypass_amount_bfg + $bypass_amount_otani + $bypass_amount_maxxis + $bypass_amount_yoko + $bypass_amount_brid
                            + $bypass_amount_toyo + $bypass_amount_nitto + $bypass_amount_goodyear + $bypass_amount_raiden + $bypass_amount_other;

                    $sum_chaofa = $chaofa_amount_michelin + $chaofa_amount_bfg + $chaofa_amount_otani + $chaofa_amount_maxxis + $chaofa_amount_yoko + $chaofa_amount_brid
                            + $chaofa_amount_toyo + $chaofa_amount_nitto + $chaofa_amount_goodyear + $chaofa_amount_raiden + $chaofa_amount_other;

                    $total = $sum_main + $sum_khokkloi + $sum_phang + $sum_thalang + $sum_thaiwat + $sum_bypass + $sum_chaofa;
                    $total_format = number_format($total);
                
                    // จำนวนที่ต้องสต๊อก
                    $main_stock = DB::table('tyre_stock_mains')->sum('stock');
                    $khokkloi_stock = DB::table('tyreproducts')->sum('stock');
                    $phang_stock = DB::table('tyrephangngas')->sum('stock');
                    $thalang_stock = DB::table('tyrethalangs')->sum('stock');
                    $thaiwat_stock = DB::table('tyrethaiwatsadus')->sum('stock');
                    $bypass_stock = DB::table('tyrebyparts')->sum('stock');
                    $chaofa_stock = DB::table('tyrechaofas')->sum('stock');

                    $total_stock = $main_stock + $khokkloi_stock + $phang_stock + $thalang_stock + $thaiwat_stock + $bypass_stock + $chaofa_stock;
                    $total_stock_format = number_format($total_stock);
                @endphp
                <center>
                    <div class="col-md-4 mt-2" style="margin-bottom: 20px; color: #00ff0a;">
                        จำนวนที่มีในสต๊อกทั้งหมด {{$total_format}} เส้น
                    </div>
                    <div class="col-md-4 mt-2" style="margin-bottom: 15px; color: #ff7d30;">
                        จำนวนที่ต้องสต๊อก {{$total_stock_format}} เส้น
                    </div>
                </center>

                @php
                    $amount_michelin = $main_amount_michelin + $khokkloi_amount_michelin + $phang_amount_michelin + $thalang_amount_michelin + $thaiwat_amount_michelin + $bypass_amount_michelin + $chaofa_amount_michelin;
                    $amount_bfg = $main_amount_bfg + $khokkloi_amount_bfg + $phang_amount_bfg + $thalang_amount_bfg + $thaiwat_amount_bfg + $bypass_amount_bfg + $chaofa_amount_bfg;
                    $amount_otani = $main_amount_otani + $khokkloi_amount_otani + $phang_amount_otani + $thalang_amount_otani + $thaiwat_amount_otani + $bypass_amount_otani + $chaofa_amount_otani;
                    $amount_maxxis = $main_amount_maxxis + $khokkloi_amount_maxxis + $phang_amount_maxxis + $thalang_amount_maxxis + $thaiwat_amount_maxxis + $bypass_amount_maxxis + $chaofa_amount_maxxis;
                    $amount_yoko = $main_amount_yoko + $khokkloi_amount_yoko + $phang_amount_yoko + $thalang_amount_yoko + $thaiwat_amount_yoko + $bypass_amount_yoko + $chaofa_amount_yoko;
                    $amount_brid = $main_amount_brid + $khokkloi_amount_brid + $phang_amount_brid + $thalang_amount_brid + $thaiwat_amount_brid + $bypass_amount_brid + $chaofa_amount_brid;
                    $amount_toyo = $main_amount_toyo + $khokkloi_amount_toyo + $phang_amount_toyo + $thalang_amount_toyo + $thaiwat_amount_toyo + $bypass_amount_toyo + $chaofa_amount_toyo;
                    $amount_nitto = $main_amount_nitto + $khokkloi_amount_nitto + $phang_amount_nitto + $thalang_amount_nitto + $thaiwat_amount_nitto + $bypass_amount_nitto + $chaofa_amount_nitto;
                    $amount_goodyear = $main_amount_goodyear + $khokkloi_amount_goodyear + $phang_amount_goodyear + $thalang_amount_goodyear + $thaiwat_amount_goodyear + $bypass_amount_goodyear + $chaofa_amount_goodyear;
                    $amount_raiden = $main_amount_raiden + $khokkloi_amount_raiden + $phang_amount_raiden + $thalang_amount_raiden + $thaiwat_amount_raiden + $bypass_amount_raiden + $chaofa_amount_raiden;
                    $amount_other = $main_amount_other + $khokkloi_amount_other + $phang_amount_other + $thalang_amount_other + $thaiwat_amount_other + $bypass_amount_other + $chaofa_amount_other;
                @endphp
                <!-- สรุปจำนวนสต๊อก -->
                <center>
                    <div style="color: #fff">
                        <p>MICHELIN = {{$amount_michelin}} เส้น</p><br>
                        <p>BF Goodrich = {{$amount_bfg}} เส้น</p><br>
                        <p>OTANI = {{$amount_otani}} เส้น</p><br>
                        <p>MAXXIS = {{$amount_maxxis}} เส้น</p><br>
                        <p>YOKOHAMA = {{$amount_yoko}} เส้น</p><br>
                        <p>BRIDGESTONE = {{$amount_brid}} เส้น</p><br>
                        <p>TOYO = {{$amount_toyo}} เส้น</p><br>
                        <p>NITTO = {{$amount_nitto}} เส้น</p><br>
                        <p>Goodyear = {{$amount_goodyear}} เส้น</p><br>
                        <p>RAIDEN = {{$amount_raiden}} เส้น</p><br>
                        <p>อื่นๆ = {{$amount_other}} เส้น</p><br><br>
                        {{-- <p style="color: red;">รวมทั้งหมด {{$total_format}} เส้น</p> --}}
                    </div>
                </center>
            </div>
        </div>
@endsection