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

    public function add_tyre(Request $request) {
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrebypart::findOrFail($id);
        $amount = Tyrebypart::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrebypart::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function delete_tyre(Request $request) {
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrebypart::findOrFail($id);
        $amount = Tyrebypart::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrebypart::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function search_add_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrebypart::findOrFail($id);
        $amount = Tyrebypart::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrebypart::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/bypart/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrebypart::findOrFail($id);
        $amount = Tyrebypart::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrebypart::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/bypart/search?search='.$search);
    }

    public function posttyredelete($id){
        Tyrebypart::destroy($id);
        return back();
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
        $michelins = Tyrebypart::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrebypart::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrebypart::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrebypart::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrebypart::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrebypart::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrebypart::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrebypart::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrebypart::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrebypart::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrebypart::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrebypart::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrebypart::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrebypart::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrebypart::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
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
                                                 ->with('continentals',$continentals)
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
