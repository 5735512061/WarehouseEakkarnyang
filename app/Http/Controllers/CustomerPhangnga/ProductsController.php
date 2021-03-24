<?php

namespace App\Http\Controllers\CustomerPhangnga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrephangnga;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrephangnga::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrephangnga::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrephangnga::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrephangnga::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrephangnga::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrephangnga::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrephangnga::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrephangnga::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrephangnga::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrephangnga::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrephangnga::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrephangnga::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrephangnga::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrephangnga::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrephangnga::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/phangnga/customer_tyre')->with('page',$page)
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
