<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Customer;
use App\Tyreproduct;
use App\Tyrebypart;
use App\Tyrethaiwatsadu;
use App\Tyrechaofa;
use App\Tyrethalang;
use App\Tyrephangnga;
use App\TyreStockMain;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index(Request $request)
    {
        $NUM_PAGE = 10;
        $michelins = TyreStockMain::where('category',"MICHELIN")->OrderBy('size','asc')->get();
        $goodrichs = TyreStockMain::where('category','=',"BF Goodrich")->OrderBy('size','asc')->get();
        $otanis = TyreStockMain::where('category','=',"OTANI")->OrderBy('size','asc')->get();
        $maxxiss = TyreStockMain::where('category','=',"MAXXIS")->OrderBy('size','asc')->get();
        $yokohamas = TyreStockMain::where('category','=',"YOKOHAMA")->OrderBy('size','asc')->get();
        $bridgestones = TyreStockMain::where('category','=',"BRIDGSTONE")->OrderBy('size','asc')->get();
        $toyos = TyreStockMain::where('category','=',"TOYO")->OrderBy('size','asc')->get();
        $nittos = TyreStockMain::where('category','=',"NITTO")->OrderBy('size','asc')->get();
        $kumhos = TyreStockMain::where('category','=',"KUMHO")->OrderBy('size','asc')->get();
        $pirellis = TyreStockMain::where('category','=',"PIRELLI")->OrderBy('size','asc')->get();
        $goodyears = TyreStockMain::where('category','=',"GOODYEAR")->OrderBy('size','asc')->get();
        $kendas = TyreStockMain::where('category','=',"KENDA")->OrderBy('size','asc')->get();
        $raidens = TyreStockMain::where('category','=',"RAIDEN")->OrderBy('size','asc')->get(); 
        $continentals = TyreStockMain::where('category','=',"CONTINENTAL")->OrderBy('size','asc')->get();
        $others = TyreStockMain::where('category','=',"อื่นๆ")->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
    	return view('/customer/stock_main/customer_tyre')->with('page',$page)
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
        return view('/customer/customer_profile', array('user' => Auth::user()));
    }

    public function update_profile(Request $request) {

        $customer_id = $request->get('id');
        $customer = Customer::findOrFail($customer_id);
        $customer->update($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." .  $image->getClientOriginalExtension();
                $image->move('images/', $filename);
                $path = 'images/'.$filename;
                $customer = Customer::findOrFail($customer_id);
                $customer->image = $filename;
                $customer->save();
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
        return view('/customer/stock_main/customer_search')->with('searchs',$searchs)
                                                ->with('page',$page)
                                                ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_yokohama_stock_main(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = TyreStockMain::where('size','like','%'.$search.'%')
                              ->where('category',"YOKOHAMA")
                              ->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/stock_main/customer_search')->with('searchs',$searchs)
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
        return view('/customer/khokkloi/customer_search')->with('searchs',$searchs)
                                                         ->with('page',$page)
                                                         ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function search_yokohama(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyreproduct::where('size','like','%'.$search.'%')
                              ->where('category',"YOKOHAMA")
                              ->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/khokkloi/customer_search')->with('searchs',$searchs)
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
        return view('/customer/bypart/customer_search')->with('searchs',$searchs)
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
        return view('/customer/thaiwatsadu/customer_search')->with('searchs',$searchs)
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
        return view('/customer/chaofa/customer_search')->with('searchs',$searchs)
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
        return view('/customer/thalang/customer_search')->with('searchs',$searchs)
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
        return view('/customer/phangnga/customer_search')->with('searchs',$searchs)
                                                         ->with('page',$page)
                                                         ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function showChangePasswordForm(){
        return view('/customer/customer_changePassword');
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

    public function stockAmount(){
        return view('/customer/stock-amount');
    }
}
