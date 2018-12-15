<?php

namespace App\Http\Controllers\CustomerKhokkloi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyreproduct;

class ProductsController extends Controller
{

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyreproduct::where('category',"MICHELIN")->get();
        $goodrichs = Tyreproduct::where('category','=',"BF Goodrich")->get();
        $otanis = Tyreproduct::where('category','=',"OTANI")->get();
        $maxxiss = Tyreproduct::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyreproduct::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyreproduct::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyreproduct::where('category','=',"TOYO")->get();
        $nittos = Tyreproduct::where('category','=',"NITTO")->get();
        $kumhos = Tyreproduct::where('category','=',"KUMHO")->get();
        $pirellis = Tyreproduct::where('category','=',"PIRELLI")->get();
        $goodyears = Tyreproduct::where('category','=',"GOODYEAR")->get();
        $kendas = Tyreproduct::where('category','=',"KENDA")->get();
        $raidens = Tyreproduct::where('category','=',"RAIDEN")->get(); 
        $others = Tyreproduct::where('category','=',"อื่นๆ")->get();
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
                                                       ->with('raidens',$raidens)
                                                       ->with('others',$others);
    }
}
