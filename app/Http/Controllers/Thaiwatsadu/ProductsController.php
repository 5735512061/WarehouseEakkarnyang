<?php

namespace App\Http\Controllers\Thaiwatsadu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyrethaiwatsadu;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/thaiwatsadu/master_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/thaiwatsadu/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrethaiwatsadu::create($tyre);
        return redirect()->action('Thaiwatsadu\ProductsController@create_tyre');
    }

    public function create_max() {
        return view('/master/thaiwatsadu/master_create_max');
    }

    public function create_oil() {
        return view('/master/thaiwatsadu/master_create_oil');
    }

    public function create_battery() {
        return view('/master/thaiwatsadu/master_create_battery');
    }

    public function create_brake() {
        return view('/master/thaiwatsadu/master_create_brake');
    }

    public function create_shock() {
        return view('/master/thaiwatsadu/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/thaiwatsadu/master_create_accessory');
    } 

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
        return view('/master/thaiwatsadu/master_tyre')->with('page',$page)
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

    public function edit_tyre($id)
    {
      $tyre = Tyrethaiwatsadu::findOrFail($id);
      return view('/master/thaiwatsadu/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrethaiwatsadu::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Thaiwatsadu\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrethaiwatsadu::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/thaiwatsadu/master_max');
    }

    public function product_oil() {
        return view('/master/thaiwatsadu/master_oil');
    }

    public function product_battery() {
        return view('/master/thaiwatsadu/master_battery');
    }

    public function product_brake() {
        return view('/master/thaiwatsadu/master_brake');
    }

    public function product_shock() {
        return view('/master/thaiwatsadu/master_shock');
    }

    public function product_accessory() {
        return view('/master/thaiwatsadu/master_accessory');
    }
}
