<?php

namespace App\Http\Controllers\AdminBypart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrebypart;
use App\Tyrecategory;
use Auth;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/bypart/admin_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/admin/bypart/admin_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrebypart::create($tyre);
        return redirect()->action('AdminBypart\ProductsController@create_tyre');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrebypart::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/bypart/admin_tyre')->with('page',$page)
                                               ->with('NUM_PAGE',$NUM_PAGE)
                                               ->with('tyres',$tyres);
    }

    public function edit_tyre($id)
    {
      $tyre = Tyrebypart::findOrFail($id);
      return view('/admin/bypart/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrebypart::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('AdminBypart\ProductsController@product_tyre');
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
        return redirect('/admin/bypart/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrebypart::findOrFail($id);
        $amount = Tyrebypart::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrebypart::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/admin/bypart/search?search='.$search);
    }
}
