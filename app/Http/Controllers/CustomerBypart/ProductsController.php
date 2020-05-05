<?php

namespace App\Http\Controllers\CustomerBypart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrebypart;

class ProductsController extends Controller
{
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrebypart::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrebypart::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrebypart::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrebypart::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrebypart::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrebypart::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrebypart::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrebypart::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrebypart::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrebypart::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrebypart::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrebypart::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrebypart::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrebypart::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrebypart::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
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
                                                     ->with('continentals',$continentals)
                                                     ->with('others',$others);
    }
}
