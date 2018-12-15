<?php

namespace App\Http\Controllers\Bypart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyrebypart;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/bypart/master_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/bypart/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrebypart::create($tyre);
        return redirect()->action('Bypart\ProductsController@create_tyre');
    }

    public function create_max() {
        return view('/master/bypart/master_create_max');
    }

    public function create_oil() {
        return view('/master/bypart/master_create_oil');
    }

    public function create_battery() {
        return view('/master/bypart/master_create_battery');
    }

    public function create_brake() {
        return view('/master/bypart/master_create_brake');
    }

    public function create_shock() {
        return view('/master/bypart/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/bypart/master_create_accessory');
    } 

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
        return view('/master/bypart/master_tyre')->with('page',$page)
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
      $tyre = Tyrebypart::findOrFail($id);
      return view('/master/bypart/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrebypart::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Bypart\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrebypart::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/bypart/master_max');
    }

    public function product_oil() {
        return view('/master/bypart/master_oil');
    }

    public function product_battery() {
        return view('/master/bypart/master_battery');
    }

    public function product_brake() {
        return view('/master/bypart/master_brake');
    }

    public function product_shock() {
        return view('/master/bypart/master_shock');
    }

    public function product_accessory() {
        return view('/master/bypart/master_accessory');
    }
}
