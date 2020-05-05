<?php

namespace App\Http\Controllers\AdminChaofa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrechaofa;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/chaofa/admin_warehouse');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrechaofa::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrechaofa::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrechaofa::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrechaofa::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrechaofa::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrechaofa::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrechaofa::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrechaofa::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrechaofa::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrechaofa::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrechaofa::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrechaofa::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrechaofa::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrechaofa::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrechaofa::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/chaofa/admin_tyre')->with('page',$page)
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
      $tyre = Tyrechaofa::findOrFail($id);
      return view('/admin/chaofa/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrechaofa::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('AdminChaofa\ProductsController@product_tyre');
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
        return redirect('/admin/chaofa/search?search='.$search);
    }

    public function search_delete_tyre(Request $request) {
        $search = $request->get('search');
        $id = $request->get('id');
        $amountdelete = $request->get('amount');
        $amount = Tyrechaofa::findOrFail($id);
        $amount = Tyrechaofa::where('id',$id)->value('amount');
        $amount -= $amountdelete;
        $amount = Tyrechaofa::where('id',$id)->update(['amount' =>  $amount]);
        return redirect('/admin/chaofa/search?search='.$search);
    }

    public function product_max() {
        return view('/admin/chaofa/admin_max');
    }

    public function product_oil() {
        return view('/admin/chaofa/admin_oil');
    }

    public function product_battery() {
        return view('/admin/chaofa/admin_battery');
    }

    public function product_brake() {
        return view('/admin/chaofa/admin_brake');
    }

    public function product_shock() {
        return view('/admin/chaofa/admin_shock');
    }

    public function product_accessory() {
        return view('/admin/chaofa/admin_accessory');
    }
}
