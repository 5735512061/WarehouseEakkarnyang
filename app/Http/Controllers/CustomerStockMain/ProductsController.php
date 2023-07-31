<?php

namespace App\Http\Controllers\CustomerStockMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TyreStockMain;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = TyreStockMain::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = TyreStockMain::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = TyreStockMain::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = TyreStockMain::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = TyreStockMain::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = TyreStockMain::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = TyreStockMain::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = TyreStockMain::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = TyreStockMain::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = TyreStockMain::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = TyreStockMain::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = TyreStockMain::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = TyreStockMain::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = TyreStockMain::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = TyreStockMain::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $bigtyres = TyreStockMain::where('category','=',"ยางใหญ่")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/stock_main/customer_tyre')->with('page',$page)
                                                       ->with('NUM_PAGE',$NUM_PAGE)
                                                       ->with('michelins',$michelins)
                                                       ->with('goodrichs',$goodrichs)
                                                       ->with('otanis',$otanis)
                                                       ->with('maxxiss',$maxxiss)
                                                       ->with('yokohamas',$yokohamas)
                                                       ->with('bridgestones',$bridgestones)
                                                       ->with('toyos',$toyos)
                                                       ->with('nittos',$nittos)
                                                       ->with('kumhos',$kumhos)
                                                       ->with('pirellis',$pirellis)
                                                       ->with('goodyears',$goodyears)
                                                       ->with('kendas',$kendas)
                                                       ->with('continentals',$continentals)
                                                       ->with('raidens',$raidens)
                                                       ->with('others',$others)
                                                       ->with('bigtyres',$bigtyres); 
    }
}
