<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends Controller
{
    public function cart()
    {
        $customer_id = Session::get('customer_id');
        if ($customer_id != null) {
            return view('pages.home.cartPage');
        } else {
            Session::put('message', 'Please Login here');
            return Redirect::to('/login');
        }
    }
    public function add_cart(Request $request)
    {
        $customer_id = Session::get('customer_id');
        if ($customer_id != null) {
            $product_id = $request->id;
            $product_qty = $request->qty;
            $product_size = $request->size;

            // $product_info = DB::table('tbl_product')->where('id', $product_id)->first();
            $product_info = Product::find($product_id);

            $data['id'] = $product_info->id;
            $data['name'] = $product_info->product_name;
            $data['quantity'] = $product_qty;
            $data['price'] = $product_info->product_price;
            $data['attributes'] = array(
                'size' => $product_size,
                'image' => $product_info->product_image
            );

            // LaraCart::add(
            //     $itemID = $product_info->id,
            //     $name =  $product_info->product_name,
            //     $qty = $product_qty,
            //     $price = $product_info->product_price,
            //     $option = [
            //         'image' => $product_info->product_image,
            //         'size' => $product_size
            //     ],
            //     $taxable = false,
            //     $lineItem = false
            // );

            \Cart::session($customer_id)->add($data);
            return Redirect::to('/cart');
        } else {
            Session::put('message', 'Please Login here');
            return Redirect::to('/login');
        }
    }

    public function update_cart_minus($id)
    {
        $customer_id = Session::get('customer_id');
        \Cart::session($customer_id)->update($id, array(
            'quantity' => -1
        ));
        return Redirect::to('/cart');
    }
    public function update_cart_plus($id)
    {
        $customer_id = Session::get('customer_id');
        \Cart::session($customer_id)->update($id, array(
            'quantity' => +1
        ));
        return Redirect::to('/cart');
    }

    public function remove_cart($id)
    {
        $customer_id = Session::get('customer_id');
        \Cart::session($customer_id)->remove($id);
        return Redirect::to('/cart');
    }
}
