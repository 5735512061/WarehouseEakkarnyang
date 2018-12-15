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
        $michelins = Tyreproduct::where('category',"MICHELIN")->get();
        $goodrichs = Tyreproduct::where('category','=',"BF Goodrich")->get();
        $otanis = Tyreproduct::where('category','=',"OTANI")->get();
        $maxxiss = Tyreproduct::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyreproduct::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyreproduct::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyreproduct::where('category','=',"TOYO")->get();
        $nittos = Tyreproduct::where('category','=',"NITTO")->get();
        $kumhos = Tyreproduct::where('category','=',"KUMHO")->get();
        $pirellis = Tyreproduct::where('category','=',"PIRELLI")->get();
        $goodyears = Tyreproduct::where('category','=',"GOODYEAR")->get();
        $kendas = Tyreproduct::where('category','=',"KENDA")->get();
        $raidens = Tyreproduct::where('category','=',"RAIDEN")->get(); 
        $others = Tyreproduct::where('category','=',"อื่นๆ")->get();
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
