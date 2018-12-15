<?php

namespace App\Http\Controllers\CustomerThaiwatsadu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrethaiwatsadu;

class ProductsController extends Controller
{
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrethaiwatsadu::where('category',"MICHELIN")->get();
        $goodrichs = Tyrethaiwatsadu::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrethaiwatsadu::where('category','=',"OTANI")->get();
        $maxxiss = Tyrethaiwatsadu::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrethaiwatsadu::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrethaiwatsadu::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrethaiwatsadu::where('category','=',"TOYO")->get();
        $nittos = Tyrethaiwatsadu::where('category','=',"NITTO")->get();
        $kumhos = Tyrethaiwatsadu::where('category','=',"KUMHO")->get();
        $pirellis = Tyrethaiwatsadu::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrethaiwatsadu::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrethaiwatsadu::where('category','=',"KENDA")->get();
        $raidens = Tyrethaiwatsadu::where('category','=',"RAIDEN")->get(); 
        $others = Tyrethaiwatsadu::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/thaiwatsadu/customer_tyre')->with('page',$page)
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
