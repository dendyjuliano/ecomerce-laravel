<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('categorys')->get();
        return view('pages.admin.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.admin.add_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image) {
            $image_name = $image->getClientOriginalName();
            // $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name;
            $upload_path = 'image/';
            $image->move($upload_path, $image_full_name);
            $image_url = $upload_path . $image_full_name;

            Product::create([
                'product_name' => $request->name,
                'category_id' => $request->category_id,
                'product_price' => $request->price,
                'status' => 1,
                'product_image' => $image_url
            ]);
        }

        Session::flash('flash', 'Created');
        return Redirect::to('/product-content');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        $category = Category::all();
        return view('pages.admin.edit_product', compact('id', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric'
        ]);

        $image = $request->file('image');

        if ($image) {
            $image_name = $image->getClientOriginalName();
            // $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name;
            $upload_path = 'image/';
            $image->move($upload_path, $image_full_name);
            $image_url = $upload_path . $image_full_name;

            Product::where('id', $id->id)->update([
                'product_name' => $request->name,
                'category_id' => $request->category_id,
                'product_price' => $request->price,
                'product_image' => $image_url
            ]);
        } else {
            Product::where('id', $id->id)->update([
                'product_name' => $request->name,
                'category_id' => $request->category_id,
                'product_price' => $request->price
            ]);
        }
        Session::flash('flash', 'Updated');
        return Redirect('/product-content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('flash', 'Deleted');
        return Redirect::to('/product-content');
    }

    public function unactive_product($id)
    {
        Product::where('id', $id)->update([
            'status' => 0
        ]);
        return Redirect::to('/product-content');
    }

    public function active_product($id)
    {
        Product::where('id', $id)->update([
            'status' => 1
        ]);
        return Redirect::to('/product-content');
    }
}
