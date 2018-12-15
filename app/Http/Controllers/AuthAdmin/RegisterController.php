<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/khokkloi/tyre';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'admin_name' => ['required', 'string', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'branch' => 'required|string|max:255',
            'tel' => 'required|regex:/(0)[0-9]{9}/',
            'address' => 'required|string|max:255',
        ],
        [
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.string' => 'กรุณากรอกรหัสผ่านเป็นข้อความ',
            'password.min' => 'กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านให้ตรงกัน',
            'master_name.required' => 'กรุณากรอกชื่อเข้าใช้งาน',
            'master_name.string' => 'กรุณากรอกชื่อเข้าใช้งานเป็นข้อความ',
            'master_name.max' => 'กรุณากรอกชื่อเข้าใช้งานความยาวไม่เกิน 255',
            'branch.required' => 'กรุณากรอกสาขา',
            'branch.string' => 'กรุณากรอกสาขาเป็นข้อความ',
            'branch.max' => 'กรุณากรอกสาขาความยาวไม่เกิน 255',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'tel.regex' => 'กรอกเบอร์โทรศัพท์ให้ถูกต้อง',
            'address.required' => 'กรุณากรอกที่อยู่',
            'address.string' => 'กรุณากรอกที่อยู่เป็นข้อความ',
            'address.max' => 'กรุณากรอกที่อยู่ความยาวไม่เกิน 255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'password' => Hash::make($data['password']),
            'admin_name' => $data['admin_name'],
            'branch' => $data['branch'],
            'tel' => $data['tel'],
            'address' => $data['address'],
            'image' =>  'profile.png',
            'role' => $data['role'],
            'comment' => $data['comment'],
        ]);
    }
}
