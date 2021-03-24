<?php

namespace App\Http\Controllers\CustomerKhokkloi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyreproduct;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyreproduct::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyreproduct::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyreproduct::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyreproduct::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyreproduct::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyreproduct::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyreproduct::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyreproduct::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyreproduct::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyreproduct::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyreproduct::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyreproduct::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyreproduct::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyreproduct::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyreproduct::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/khokkloi/customer_tyre')->with('page',$page)
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
                                                       ->with('others',$others); 
    }
}
