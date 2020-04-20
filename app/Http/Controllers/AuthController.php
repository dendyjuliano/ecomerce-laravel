<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function register_check(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = $request->password;
        $data['role_id'] = 2;
        $data['image'] = 'image/default.png';

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        return Redirect::to('/');
    }

    public function login_check(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('tbl_customer')->where('email', $email)->where('password', $password)->first();

        if ($result) {
            $customer_role_id = $result->role_id;
            $customer_id = $result->id;
            if ($customer_role_id == 1) {
                Session::put('customer_id', $customer_id);
                return Redirect::to('/admin-home');
            } else {
                Session::put('customer_id', $customer_id);
                return Redirect::to('/');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
}
