<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authCustomer.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
          'customer_name' => 'required',
          'password' => 'required|min:6'
        ],[
          'customer_name.required' => "กรุณากรอกชื่อผู้ใช้",
          'password.required' => "กรุณากรอกรหัสผ่าน",
          'password.min' => "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร",
        ]);


        $credential = [
          'customer_name' => $request->customer_name,
          'password' =>$request->password,
          'status'=> '1'
        ];

       if(Auth::guard('customer')->attempt($credential, $request->member)){
         return redirect()->intended(route('customer.home'));
       }
       
       return redirect()->back()->withInput($request->only('customer_name','remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'customer.login' ));
    }
}
