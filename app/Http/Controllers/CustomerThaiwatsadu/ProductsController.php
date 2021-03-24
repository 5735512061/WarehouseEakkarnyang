<?php

namespace App\Http\Controllers\CustomerThaiwatsadu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrethaiwatsadu;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrethaiwatsadu::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrethaiwatsadu::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrethaiwatsadu::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrethaiwatsadu::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrethaiwatsadu::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrethaiwatsadu::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrethaiwatsadu::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrethaiwatsadu::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrethaiwatsadu::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrethaiwatsadu::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrethaiwatsadu::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrethaiwatsadu::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrethaiwatsadu::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrethaiwatsadu::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrethaiwatsadu::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
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
                                                          ->with('continentals',$continentals)
                                                          ->with('others',$others);
    }
}
