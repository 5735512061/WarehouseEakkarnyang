<?php

namespace App\Http\Controllers\CustomerChaofa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrechaofa;

class ProductsController extends Controller
{
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrechaofa::where('category',"MICHELIN")->get();
        $goodrichs = Tyrechaofa::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrechaofa::where('category','=',"OTANI")->get();
        $maxxiss = Tyrechaofa::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrechaofa::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrechaofa::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrechaofa::where('category','=',"TOYO")->get();
        $nittos = Tyrechaofa::where('category','=',"NITTO")->get();
        $kumhos = Tyrechaofa::where('category','=',"KUMHO")->get();
        $pirellis = Tyrechaofa::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrechaofa::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrechaofa::where('category','=',"KENDA")->get();
        $raidens = Tyrechaofa::where('category','=',"RAIDEN")->get(); 
        $others = Tyrechaofa::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/chaofa/customer_tyre')->with('page',$page)
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
