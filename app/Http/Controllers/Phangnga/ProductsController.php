<?php

namespace App\Http\Controllers\Phangnga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrecategory;
use App\Tyrephangnga;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/master/phangnga/master_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/master/phangnga/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyrecategories = Tyrecategory::get();
        $tyre = request()->all();
        Tyrephangnga::create($tyre);
        return view('/master/phangnga/master_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function add_tyre(Request $request) {
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function delete_tyre(Request $request) {
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function search_add_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/phangnga/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/phangnga/search?search='.$search);
    }

    public function posttyredelete($id){
        Tyrephangnga::destroy($id);
        return back();
    }

    public function create_max() {
        return view('/master/phangnga/master_create_max');
    }

    public function create_oil() {
        return view('/master/phangnga/master_create_oil');
    }

    public function create_battery() {
        return view('/master/phangnga/master_create_battery');
    }

    public function create_brake() {
        return view('/master/phangnga/master_create_brake');
    }

    public function create_shock() {
        return view('/master/phangnga/master_create_shock');
    }

    public function create_accessory() {
        return view('/master/phangnga/master_create_accessory');
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
        return view('/master/phangnga/master_tyre')->with('page',$page)
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

    public function edit_tyre($id)
    {
      $tyre = Tyrephangnga::findOrFail($id);
      return view('/master/phangnga/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
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
        $id = $request->get('id');
        $tyre = Tyrephangnga::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/phangnga/master_tyre')->with('page',$page)
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

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrephangnga::destroy($id);    
        return back();
    }

    public function product_max() {
        return view('/master/phangnga/master_max');
    }

    public function product_oil() {
        return view('/master/phangnga/master_oil');
    }

    public function product_battery() {
        return view('/master/phangnga/master_battery');
    }

    public function product_brake() {
        return view('/master/phangnga/master_brake');
    }

    public function product_shock() {
        return view('/master/phangnga/master_shock');
    }

    public function product_accessory() {
        return view('/master/phangnga/master_accessory');
    }
}
