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

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrethaiwatsadu::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/thaiwatsadu/master_tyre')->with('page',$page)
                                                      ->with('NUM_PAGE',$NUM_PAGE)
                                                      ->with('tyres',$tyres);
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
}
