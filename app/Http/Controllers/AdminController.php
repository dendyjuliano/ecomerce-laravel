<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Customer;

class AdminController extends Controller
{
    public function admin_home()
    {
        $customer_id = Session::get('customer_id');
        $data_customer = Customer::where('id', $customer_id)->get();
        return view('pages.admin.dashboard', compact('data_customer'));
    }
}
