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

    public function add_tyre(Request $request) {
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrechaofa::findOrFail($id);
        $amount = Tyrechaofa::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrechaofa::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function delete_tyre(Request $request) {
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrechaofa::findOrFail($id);
        $amount = Tyrechaofa::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrechaofa::where('id',$id)->update(['amount' =>  $amount]);
        return back();
    }

    public function search_add_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountadd = $request->get('amount');
        $amount = Tyrechaofa::findOrFail($id);
        $amount = Tyrechaofa::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrechaofa::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/chaofa/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrechaofa::findOrFail($id);
        $amount = Tyrechaofa::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrechaofa::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/master/chaofa/search?search='.$search);
    }

    public function posttyredelete($id){
        Tyrechaofa::destroy($id);
        return back();
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrechaofa::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/chaofa/master_tyre')->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('tyres',$tyres);
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
}
