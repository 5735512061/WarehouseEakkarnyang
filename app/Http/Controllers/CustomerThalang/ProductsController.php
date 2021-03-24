<?php

namespace App\Http\Controllers\CustomerThalang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrethalang;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrethalang::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrethalang::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrethalang::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrethalang::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrethalang::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrethalang::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrethalang::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrethalang::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrethalang::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrethalang::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrethalang::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrethalang::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrethalang::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrethalang::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrethalang::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/thalang/customer_tyre')->with('page',$page)
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
                                                      ->with('raidens',$raidens)
                                                      ->with('continentals',$continentals)
                                                      ->with('others',$others);
    }
}
