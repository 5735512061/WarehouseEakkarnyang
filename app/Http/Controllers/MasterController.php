<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Admin;
use App\Customer;
use App\User;
use App\Tyreproduct;
use App\Tyrebypart;
use App\Tyrethaiwatsadu;
use App\Tyrechaofa;
use App\Tyrethalang;
use App\Tyrephangnga;
use Validator;
use Redirect;


class MasterController extends Controller
{

    public function register_admin() {
    	return view('/master/master_create_admin');
    }

    public function create_admin(Request $request){
    	$admin = request()->all();
    	$admin['image'] = 'profile.png';
    	$admin['password'] = bcrypt($admin['password']);
    	Admin::create($admin);
    	return redirect()->action('MasterController@register_admin');
    }

    public function register_customer() {
    	return view('/master/master_create_customer');
    }

    public function create_customer(Request $request){
    	$customer = request()->all();
    	$customer['image'] = 'profile.png';
    	$customer['password'] = bcrypt($customer['password']);
    	Customer::create($customer);
    	return redirect()->action('MasterController@register_customer');
    }

    public function data_admin(Request $request) {
        $NUM_PAGE = 10;
        $admins = Admin::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/master_admin')->with('page',$page)
                                           ->with('NUM_PAGE',$NUM_PAGE)
                                           ->with('admins',$admins);
    }

    public function data_customer(Request $request) {
        $NUM_PAGE = 10;
        $customers = Customer::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/master_customer')->with('page',$page)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('customers',$customers);
    }

    public function role(Request $request) {
        $NUM_PAGE = 10;
        $roles = Customer::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/master_role')->with('page',$page)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('roles',$roles);
    }

    public function block_admin(Request $request,$id){
            $admin = Admin::findOrFail($id);
            if($admin->status == '1' )
                $admin->update(['status' => '0']);
            else
                $admin->update(['status' => '1','comment'=>null]);
        return back();
    }

    public function blockadmin(Request $request,$id){

       $note = $request->note;
            if($note!=null){
                $admin = Admin::findOrFail($id);
                $admin->update(['status' => '0','comment' => $note]);
            return back();
       }
       else {
            return back();
        }
    }

    public function block_customer(Request $request,$id){
        $customer = Customer::findOrFail($id);
            if($customer->status == '1' )
                $customer->update(['status' => '0']);
            else
                $customer->update(['status' => '1','comment'=>null]);
        return back();
    }

    public function blockcustomer(Request $request,$id){
       $note = $request->note;
            if($note!=null){
                $customer = Customer::findOrFail($id);
                $customer->update(['status' => '0','comment' => $note]);
            return back();
       }
       else {
            return back();
        }
    }

    public function profile() {
        return view('/master/master_profile', array('user' => Auth::user()));
    }

    public function update_profile(Request $request) {

        $master_id = $request->get('id');
        $master = User::findOrFail($master_id);
        $master->update($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." .  $image->getClientOriginalExtension();
                $image->move('images/', $filename);
                $path = 'images/'.$filename;
                $master = User::findOrFail($master_id);
                $master->image = $filename;
                $master->save();
            }
        return back();
    }

    public function search_khokkloi(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyreproduct::where('size','like','%'.$search.'%')
                              ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/khokkloi/master_search')->with('searchs',$searchs)
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
        return view('/master/khokkloi/master_search')->with('searchs',$searchs)
                                                     ->with('page',$page)
                                                     ->with('search_old',$search)
                                                     ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function search_bypart(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $searchs = Tyrebypart::where('size','like','%'.$search.'%')
                             ->orderByRaw('FIELD(category,"MICHELIN","BF Goodrich","OTANI","MAXXIS","YOKOHAMA","BRIDGSTONE","TOYO","NITTO","KUMHO","PIRELLI","GOODYEAR","KENDA","RAIDEN","อื่นๆ")')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/master/bypart/master_search')->with('searchs',$searchs)
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
        return view('/master/bypart/master_search')->with('searchs',$searchs)
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
        return view('/master/thaiwatsadu/master_search')->with('searchs',$searchs)
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
        return view('/master/thaiwatsadu/master_search')->with('searchs',$searchs)
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
        return view('/master/chaofa/master_search')->with('searchs',$searchs)
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
        return view('/master/chaofa/master_search')->with('searchs',$searchs)
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
        return view('/master/thalang/master_search')->with('searchs',$searchs)
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
        return view('/master/thalang/master_search')->with('searchs',$searchs)
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
        return view('/master/phangnga/master_search')->with('searchs',$searchs)
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
        return view('/master/phangnga/master_search')->with('searchs',$searchs)
                                                     ->with('search_old',$search)
                                                     ->with('page',$page)
                                                     ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function showChangePasswordForm(){
        return view('/master/master_changePassword');
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
