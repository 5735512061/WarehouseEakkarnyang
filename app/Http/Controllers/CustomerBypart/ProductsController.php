<?php

namespace App\Http\Controllers\CustomerBypart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrebypart;

class ProductsController extends Controller
{
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrebypart::where('category',"MICHELIN")->get();
        $goodrichs = Tyrebypart::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrebypart::where('category','=',"OTANI")->get();
        $maxxiss = Tyrebypart::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrebypart::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrebypart::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrebypart::where('category','=',"TOYO")->get();
        $nittos = Tyrebypart::where('category','=',"NITTO")->get();
        $kumhos = Tyrebypart::where('category','=',"KUMHO")->get();
        $pirellis = Tyrebypart::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrebypart::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrebypart::where('category','=',"KENDA")->get();
        $raidens = Tyrebypart::where('category','=',"RAIDEN")->get(); 
        $others = Tyrebypart::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/bypart/customer_tyre')->with('page',$page)
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
