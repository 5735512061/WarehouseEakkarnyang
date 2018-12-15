<?php

namespace App\Http\Controllers\Thalang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyrethalang;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/thalang/master_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/thalang/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrethalang::create($tyre);
        return redirect()->action('Thalang\ProductsController@create_tyre');
    }

    public function create_max() {
        return view('/master/thalang/master_create_max');
    }

    public function create_oil() {
        return view('/master/thalang/master_create_oil');
    }

    public function create_battery() {
        return view('/master/thalang/master_create_battery');
    }

    public function create_brake() {
        return view('/master/thalang/master_create_brake');
    }

    public function create_shock() {
        return view('/master/thalang/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/thalang/master_create_accessory');
    } 

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrethalang::where('category',"MICHELIN")->get();
        $goodrichs = Tyrethalang::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrethalang::where('category','=',"OTANI")->get();
        $maxxiss = Tyrethalang::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrethalang::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrethalang::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrethalang::where('category','=',"TOYO")->get();
        $nittos = Tyrethalang::where('category','=',"NITTO")->get();
        $kumhos = Tyrethalang::where('category','=',"KUMHO")->get();
        $pirellis = Tyrethalang::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrethalang::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrethalang::where('category','=',"KENDA")->get();
        $raidens = Tyrethalang::where('category','=',"RAIDEN")->get(); 
        $others = Tyrethalang::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/thalang/master_tyre')->with('page',$page)
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
      $tyre = Tyrethalang::findOrFail($id);
      return view('/master/thalang/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrethalang::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Thalang\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrethalang::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/thalang/master_max');
    }

    public function product_oil() {
        return view('/master/thalang/master_oil');
    }

    public function product_battery() {
        return view('/master/thalang/master_battery');
    }

    public function product_brake() {
        return view('/master/thalang/master_brake');
    }

    public function product_shock() {
        return view('/master/thalang/master_shock');
    }

    public function product_accessory() {
        return view('/master/thalang/master_accessory');
    }
}
