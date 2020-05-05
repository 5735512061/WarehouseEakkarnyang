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

    public function add_tyre(Request $request) {
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrethaiwatsadu::findOrFail($id);
        $amount = Tyrethaiwatsadu::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrethaiwatsadu::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function delete_tyre(Request $request) {
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrethaiwatsadu::findOrFail($id);
        $amount = Tyrethaiwatsadu::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrethaiwatsadu::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }
    public function search_add_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrethaiwatsadu::findOrFail($id);
        $amount = Tyrethaiwatsadu::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrethaiwatsadu::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/thaiwatsadu/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrethaiwatsadu::findOrFail($id);
        $amount = Tyrethaiwatsadu::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrethaiwatsadu::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/thaiwatsadu/search?search='.$search);
    }

    public function posttyredelete($id){
        Tyrethaiwatsadu::destroy($id);
        return back();
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
                                                      ->with('continentals',$continentals)
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
