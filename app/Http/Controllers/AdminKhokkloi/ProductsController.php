<?php

namespace App\Http\Controllers\AdminKhokkloi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyreproduct;
use Auth;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/khokkloi/admin_warehouse');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyreproduct::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyreproduct::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyreproduct::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyreproduct::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyreproduct::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyreproduct::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyreproduct::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyreproduct::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyreproduct::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyreproduct::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyreproduct::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyreproduct::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyreproduct::where('category','=',"RAIDEN")->OrderBy('size','asc')->get();
        $continentals = Tyreproduct::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get(); 
        $others = Tyreproduct::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/khokkloi/admin_tyre')->with('page',$page)
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
      $tyre = Tyreproduct::findOrFail($id);
      return view('/admin/khokkloi/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyreproduct::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('AdminKhokkloi\ProductsController@product_tyre');
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
        return redirect('/admin/khokkloi/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyreproduct::findOrFail($id);
        $amount = Tyreproduct::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyreproduct::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/admin/khokkloi/search?search='.$search);
    }

    public function product_max() {
        return view('/admin/khokkloi/admin_max');
    }

    public function product_oil() {
        return view('/admin/khokkloi/admin_oil');
    }

    public function product_battery() {
        return view('/admin/khokkloi/admin_battery');
    }

    public function product_brake() {
        return view('/admin/khokkloi/admin_brake');
    }

    public function product_shock() {
        return view('/admin/khokkloi/admin_shock');
    }

    public function product_accessory() {
        return view('/admin/khokkloi/admin_accessory');
    }
}
