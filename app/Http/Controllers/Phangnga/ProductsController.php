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
        $tyre = $request->all();
        Tyrephangnga::create($tyre);
        return back();
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

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrephangnga::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/phangnga/master_tyre')->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('tyres',$tyres);
    }

    public function edit_tyre($id)
    {
      $tyre = Tyrephangnga::findOrFail($id);
      return view('/master/phangnga/master_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrephangnga::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('Phangnga\ProductsController@product_tyre');
    }

    public function delete(Request $request){
        $id = $request->get('id');
        Tyrephangnga::destroy($id);    
        return back();
    }
}
