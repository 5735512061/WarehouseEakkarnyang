<?php

namespace App\Http\Controllers\Chaofa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyrechaofa;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/chaofa/master_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/chaofa/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrechaofa::create($tyre);
        return redirect()->action('Chaofa\ProductsController@create_tyre');
    }

    public function create_max() {
        return view('/master/chaofa/master_create_max');
    }

    public function create_oil() {
        return view('/master/chaofa/master_create_oil');
    }

    public function create_battery() {
        return view('/master/chaofa/master_create_battery');
    }

    public function create_brake() {
        return view('/master/chaofa/master_create_brake');
    }

    public function create_shock() {
        return view('/master/chaofa/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/chaofa/master_create_accessory');
    } 

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
        return view('/master/chaofa/master_tyre')->with('page',$page)
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
      $tyre = Tyrechaofa::findOrFail($id);
      return view('/master/chaofa/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrechaofa::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Chaofa\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrechaofa::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/chaofa/master_max');
    }

    public function product_oil() {
        return view('/master/chaofa/master_oil');
    }

    public function product_battery() {
        return view('/master/chaofa/master_battery');
    }

    public function product_brake() {
        return view('/master/chaofa/master_brake');
    }

    public function product_shock() {
        return view('/master/chaofa/master_shock');
    }

    public function product_accessory() {
        return view('/master/chaofa/master_accessory');
    }
}
