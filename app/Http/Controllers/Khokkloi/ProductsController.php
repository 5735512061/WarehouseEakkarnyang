<?php

namespace App\Http\Controllers\Khokkloi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyreproduct;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/khokkloi/master_warehouse');
    }

  	public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/khokkloi/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyreproduct::create($tyre);
        return redirect()->action('Khokkloi\ProductsController@create_tyre');
    }

    public function create_max() {
        return view('/master/khokkloi/master_create_max');
    }

    public function create_oil() {
        return view('/master/khokkloi/master_create_oil');
    }

    public function create_battery() {
        return view('/master/khokkloi/master_create_battery');
    }

    public function create_brake() {
        return view('/master/khokkloi/master_create_brake');
    }

    public function create_shock() {
        return view('/master/khokkloi/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/khokkloi/master_create_accessory');
    } 

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyreproduct::where('category',"MICHELIN")->get();
        $goodrichs = Tyreproduct::where('category','=',"BF Goodrich")->get();
        $otanis = Tyreproduct::where('category','=',"OTANI")->get();
        $maxxiss = Tyreproduct::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyreproduct::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyreproduct::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyreproduct::where('category','=',"TOYO")->get();
        $nittos = Tyreproduct::where('category','=',"NITTO")->get();
        $kumhos = Tyreproduct::where('category','=',"KUMHO")->get();
        $pirellis = Tyreproduct::where('category','=',"PIRELLI")->get();
        $goodyears = Tyreproduct::where('category','=',"GOODYEAR")->get();
        $kendas = Tyreproduct::where('category','=',"KENDA")->get();
        $raidens = Tyreproduct::where('category','=',"RAIDEN")->get(); 
        $others = Tyreproduct::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/khokkloi/master_tyre')->with('page',$page)
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
      $tyre = Tyreproduct::findOrFail($id);
      return view('/master/khokkloi/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyreproduct::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Khokkloi\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyreproduct::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/khokkloi/master_max');
    }

    public function product_oil() {
        return view('/master/khokkloi/master_oil');
    }

    public function product_battery() {
        return view('/master/khokkloi/master_battery');
    }

    public function product_brake() {
        return view('/master/khokkloi/master_brake');
    }

    public function product_shock() {
        return view('/master/khokkloi/master_shock');
    }

    public function product_accessory() {
        return view('/master/khokkloi/master_accessory');
    }
}
