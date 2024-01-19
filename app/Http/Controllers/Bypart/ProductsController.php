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

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrebypart::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/bypart/master_tyre')->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('tyres',$tyres);
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
}
