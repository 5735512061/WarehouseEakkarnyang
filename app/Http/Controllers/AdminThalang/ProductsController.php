<?php

namespace App\Http\Controllers\AdminThalang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrethalang;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/thalang/admin_warehouse');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $michelins = Tyrethalang::where('category',"MICHELIN")->get();
        $goodrichs = Tyrethalang::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrethalang::where('category','=',"OTANI")->get();
        $maxxiss = Tyrethalang::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrethalang::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrethalang::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrethalang::where('category','=',"TOYO")->get();
        $nittos = Tyrethalang::where('category','=',"NITTO")->get();
        $kumhos = Tyrethalang::where('category','=',"KUMHO")->get();
        $pirellis = Tyrethalang::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrethalang::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrethalang::where('category','=',"KENDA")->get();
        $raidens = Tyrethalang::where('category','=',"RAIDEN")->get(); 
        $others = Tyrethalang::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thalang/admin_tyre')->with('page',$page)
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
      $tyre = Tyrethalang::findOrFail($id);
      return view('/admin/thalang/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrethalang::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        return redirect()->action('AdminThalang\ProductsController@product_tyre');
    }

    public function product_max() {
        return view('/admin/thalang/admin_max');
    }

    public function product_oil() {
        return view('/admin/thalang/admin_oil');
    }

    public function product_battery() {
        return view('/admin/thalang/admin_battery');
    }

    public function product_brake() {
        return view('/admin/thalang/admin_brake');
    }

    public function product_shock() {
        return view('/admin/thalang/admin_shock');
    }

    public function product_accessory() {
        return view('/admin/thalang/admin_accessory');
    }
}
