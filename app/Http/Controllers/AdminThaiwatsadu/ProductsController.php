<?php

namespace App\Http\Controllers\AdminThaiwatsadu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrethaiwatsadu;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/thaiwatsadu/admin_warehouse');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrethaiwatsadu::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thaiwatsadu/admin_tyre')->with('page',$page)
                                                    ->with('NUM_PAGE',$NUM_PAGE)
                                                    ->with('tyres',$tyres);
    }

    public function edit_tyre($id)
    {
      $tyre = Tyrethaiwatsadu::findOrFail($id);
      return view('/admin/thaiwatsadu/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrethaiwatsadu::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('AdminThaiwatsadu\ProductsController@product_tyre');
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
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount += $amountadd;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/admin/phangnga/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrephangnga::findOrFail($id);
        $amount = Tyrephangnga::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrephangnga::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/admin/phangnga/search?search='.$search);
    }
}
