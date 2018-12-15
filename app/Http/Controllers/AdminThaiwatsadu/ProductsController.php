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
        $michelins = Tyrethaiwatsadu::where('category',"MICHELIN")->get();
        $goodrichs = Tyrethaiwatsadu::where('category','=',"BF Goodrich")->get();
        $otanis = Tyrethaiwatsadu::where('category','=',"OTANI")->get();
        $maxxiss = Tyrethaiwatsadu::where('category','=',"MAXXIS")->get();
        $yokohamas = Tyrethaiwatsadu::where('category','=',"YOKOHAMA")->get();
        $bridgestones = Tyrethaiwatsadu::where('category','=',"BRIDGSTONE")->get();
        $toyos = Tyrethaiwatsadu::where('category','=',"TOYO")->get();
        $nittos = Tyrethaiwatsadu::where('category','=',"NITTO")->get();
        $kumhos = Tyrethaiwatsadu::where('category','=',"KUMHO")->get();
        $pirellis = Tyrethaiwatsadu::where('category','=',"PIRELLI")->get();
        $goodyears = Tyrethaiwatsadu::where('category','=',"GOODYEAR")->get();
        $kendas = Tyrethaiwatsadu::where('category','=',"KENDA")->get();
        $raidens = Tyrethaiwatsadu::where('category','=',"RAIDEN")->get(); 
        $others = Tyrethaiwatsadu::where('category','=',"อื่นๆ")->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thaiwatsadu/admin_tyre')->with('page',$page)
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

    public function product_max() {
        return view('/admin/thaiwatsadu/admin_max');
    }

    public function product_oil() {
        return view('/admin/thaiwatsadu/admin_oil');
    }

    public function product_battery() {
        return view('/admin/thaiwatsadu/admin_battery');
    }

    public function product_brake() {
        return view('/admin/thaiwatsadu/admin_brake');
    }

    public function product_shock() {
        return view('/admin/thaiwatsadu/admin_shock');
    }

    public function product_accessory() {
        return view('/admin/thaiwatsadu/admin_accessory');
    }
}
