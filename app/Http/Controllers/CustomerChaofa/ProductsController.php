<?php

namespace App\Http\Controllers\CustomerChaofa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrechaofa;

class ProductsController extends Controller
{
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrechaofa::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrechaofa::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrechaofa::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrechaofa::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrechaofa::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrechaofa::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrechaofa::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrechaofa::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrechaofa::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrechaofa::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrechaofa::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrechaofa::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrechaofa::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrechaofa::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrechaofa::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
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
                                                     ->with('continentals',$continentals)
                                                     ->with('others',$others);
    }
}
