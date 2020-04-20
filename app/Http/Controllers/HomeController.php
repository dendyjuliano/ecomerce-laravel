<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Customer;
use App\Shipping;
use App\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $product = Product::with('categorys')->limit(3)->get();
        return view('pages.home.landingPage', compact('category', 'product'));
    }

    public function all_product()
    {
        $category = Category::all();
        $product = Product::with('categorys')->get();
        return view('pages.home.allProductPage', compact('category', 'product'));
    }

    public function product_category(Category $category_id)
    {
        $title = $category_id->category_name;
        $category = Category::all();
        $product = Product::with('categorys')->where('category_id', $category_id->id)->get();

        return view('pages.home.categoryProductPage', compact('category', 'product', 'title'));
    }

    public function product_detail(Product $product_id)
    {
        return view('pages.home.detailProductPage', compact('product_id'));
    }

    public function my_profile($id)
    {
        $customer = Customer::with('roles')->find($id);
        return view('pages.home.profilePage', compact('customer'));
    }

    public function update_profile(Request $request, Customer $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $image = $request->file('image');

        if ($image) {
            $image_name = $image->getClientOriginalName();
            // $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name;
            $upload_path = 'image/';
            $image->move($upload_path, $image_full_name);
            $image_url = $upload_path . $image_full_name;

            Customer::where('id', $id->id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'image' => $image_url
            ]);
        } else {
            Customer::where('id', $id->id)->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);
        }
        return Redirect('/my-profile/' . $id->id);
    }

    public function my_order($id)
    {
        $shipping = Shipping::where('customer_id', $id)->get();
        $id_shipping =  $shipping[0]->id;
        $transaction = Transaction::with('rl_shipping', 'rl_product')->where('id_customer', $id)->get();
        return view('pages.home.myOrderPage', compact('transaction'));
    }

    public function about()
    {
        return view('pages.home.aboutPage');
    }
}
