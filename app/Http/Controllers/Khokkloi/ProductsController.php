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

    public function add_tyre(Request $request) {
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyreproduct::findOrFail($id);
        $amount = Tyreproduct::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyreproduct::where('id',$id)->update(['amount' =>  $amount]);        
        return back();
    }

    public function delete_tyre(Request $request) {
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyreproduct::findOrFail($id);
        $amount = Tyreproduct::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyreproduct::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function search_add_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyreproduct::findOrFail($id);
        $amount = Tyreproduct::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyreproduct::where('id',$id)->update(['amount' =>  $amount]);        
        return redirect('/master/khokkloi/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyreproduct::findOrFail($id);
        $amount = Tyreproduct::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyreproduct::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/khokkloi/search?search='.$search);
    }

    public function posttyredelete($id){
        Tyreproduct::destroy($id);
        return back();
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyreproduct::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/khokkloi/master_tyre')->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('tyres',$tyres);
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
}
