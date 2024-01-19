<?php

namespace App\Http\Controllers\AdminPhangnga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tyrephangnga;
use App\Tyrecategory;
use Auth;

class ProductsController extends Controller
{
    public function warehouse() {
        return view('/admin/phangnga/admin_warehouse');
    }

    public function create_tyre() {
        $tyrecategories = Tyrecategory::get();
        return view('/admin/phangnga/admin_create_tyre')->with('tyrecategories',$tyrecategories);
    }

    public function createtyre(Request $request) {
        $tyre = request()->all();
        Tyrephangnga::create($tyre);
        return redirect()->action('AdminPhangnga\ProductsController@create_tyre');
    }

    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrephangnga::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/phangnga/admin_tyre')->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('tyres',$tyres);
    }

    public function edit_tyre($id)
    {
      $tyre = Tyrephangnga::findOrFail($id);
      return view('/admin/phangnga/admin_tyre_edit')->with('tyre', $tyre);
    }

    public function update_tyre(Request $request)
    {
        $id = $request->get('id');
        $tyre = Tyrephangnga::findOrFail($id);
        $tyre->update($request->all());
        $tyre->save();
        $NUM_PAGE = 10;
        $michelins = Tyrephangnga::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = Tyrephangnga::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = Tyrephangnga::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = Tyrephangnga::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = Tyrephangnga::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = Tyrephangnga::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = Tyrephangnga::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = Tyrephangnga::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = Tyrephangnga::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = Tyrephangnga::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = Tyrephangnga::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = Tyrephangnga::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = Tyrephangnga::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = Tyrephangnga::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = Tyrephangnga::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/phangnga/admin_tyre')->with('page',$page)
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

