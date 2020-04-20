<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Shipping;
use App\Transaction;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $customer_id = Session::get('customer_id');
        $items = \Cart::session($customer_id)->getContent();
        if (count($items) > 0) {
            return view('pages.home.checkoutPage');
        } else {
            return Redirect::to('/cart');
        }
    }

    public function checkout_check(Request $request)
    {
        $customer_id = Session::get('customer_id');
        $items = \Cart::session($customer_id)->getContent();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $name = $request->name;
        $id_customer = $customer_id;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $notes = $request->notes;

        $shipping_id = Shipping::insertGetId([
            'name' => $name,
            'customer_id' => $id_customer,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'notes' => $notes,
            'order_date' => date('Y-m-d H:i:s'),
            'pay_limit' => date('Y-m-d H:i:s', mktime(
                date('H'),
                date('i'),
                date('s'),
                date('m'),
                date('d') + 3,
                date('Y')
            ))
        ]);

        $i = 0;
        $array = array();

        foreach ($items as $row) {
            $array[$i]['id_customer'] = $customer_id;
            $array[$i]['id_shipping'] = $shipping_id;
            $array[$i]['id_product'] = $row->id;
            $array[$i]['quantity'] = $row->quantity;
            $array[$i]['price'] = $row->price;
            $array[$i]['size'] = $row->attributes->size;
            $array[$i]['product_image'] = $row->attributes->image;
            $i++;
        }

        $checkout_data = Transaction::insert($array);
        if ($checkout_data) {
            \Cart::session($customer_id)->clear();
            return Redirect::to('/success');
        } else {
            echo "Gagal Memasukan data";
        }
    }

    public function success()
    {
        return view('pages.home.successPage');
    }
}
