<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Customer;
use App\Admin;
use App\Tyreproduct;
use App\Tyrebypart;
use App\Tyrethaiwatsadu;
use App\Tyrechaofa;
use App\Tyrethalang;
use App\Tyrephangnga;
use App\TyreStockMain;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
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

    public function profile() {
        return view('/admin/admin_profile', array('user' => Auth::user()));
    }

    public function update_profile(Request $request) {

        $admin_id = $request->get('id');
        $admin = Admin::findOrFail($admin_id);
        $admin->update($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." .  $image->getClientOriginalExtension();
                $image->move('images/', $filename);
                $path = 'images/'.$filename;
                $admin = Admin::findOrFail($admin_id);
                $admin->image = $filename;
                $admin->save();
            }
        return back();
    }

    public function search_stock_main(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = TyreStockMain::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/stock_main/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_stock_main_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = TyreStockMain::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/stock_main/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_khokkloi(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyreproduct::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/khokkloi/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_khokkloi_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyreproduct::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/khokkloi/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_bypart(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrebypart::where('size','like','%'.$search.'%')
                             ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/bypart/admin_search')->with('searchs',$searchs)
                                                 ->with('search_old',$search)
                                                 ->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_bypart_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrebypart::where('size','like','%'.$search.'%')
                             ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/bypart/admin_search')->with('searchs',$searchs)
                                                 ->with('search_old',$search)
                                                 ->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_thaiwatsadu(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrethaiwatsadu::where('size','like','%'.$search.'%')
                                  ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thaiwatsadu/admin_search')->with('searchs',$searchs)
                                                      ->with('search_old',$search)
                                                      ->with('page',$page)
                                                      ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_thaiwatsadu_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrethaiwatsadu::where('size','like','%'.$search.'%')
                                  ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thaiwatsadu/admin_search')->with('searchs',$searchs)
                                                      ->with('search_old',$search)
                                                      ->with('page',$page)
                                                      ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_chaofa(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrechaofa::where('size','like','%'.$search.'%')
                             ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/chaofa/admin_search')->with('searchs',$searchs)
                                                 ->with('search_old',$search)
                                                 ->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_chaofa_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrechaofa::where('size','like','%'.$search.'%')
                             ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/chaofa/admin_search')->with('searchs',$searchs)
                                                 ->with('search_old',$search)
                                                 ->with('page',$page)
                                                 ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_thalang(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrethalang::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thalang/admin_search')->with('searchs',$searchs)
                                                  ->with('search_old',$search)
                                                  ->with('page',$page)
                                                  ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_thalang_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrethalang::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/thalang/admin_search')->with('searchs',$searchs)
                                                  ->with('search_old',$search)
                                                  ->with('page',$page)
                                                  ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_phangnga(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrephangnga::where('size','like','%'.$search.'%')
                               ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/phangnga/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_phangnga_get(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrephangnga::where('size','like','%'.$search.'%')
                               ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/phangnga/admin_search')->with('searchs',$searchs)
                                                   ->with('search_old',$search)
                                                   ->with('page',$page)
                                                   ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function showChangePasswordForm(){
        return view('/admin/admin_changePassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","รหัสผ่านปัจจุบันของคุณไม่ตรงกับรหัสผ่านที่คุณระบุ กรุณาลองอีกครั้ง");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->with("error","รหัสผ่านใหม่ต้องไม่เหมือนกับรหัสผ่านปัจจุบันของคุณ โปรดเลือกรหัสผ่านอื่น");
        }
        $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
            ],[
                'current-password.required' => 'กรุณากรอกรหัสผ่านเก่า',
                'new-password.required' => 'กรุณากรอกรหัสผ่านใหม่',
                'new-password.min' => 'กรุณากรอกรหัสผ่านใหม่อย่างน้อย 6 อักษร',
                'new-password.confirmed' => 'กรุณายืนยันรหัสผ่านใหม่',
            ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","เปลี่ยนรหัสผ่านสำเร็จ");
    }
}
