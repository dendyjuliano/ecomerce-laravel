<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Role;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('pages.admin.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add_category');
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

            Category::create([
                'category_name' => $request->name,
                'status' => 1,
                'image' => $image_url
            ]);
        }


        Session::flash('flash', 'Created');
        return Redirect('/category-content');
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
    public function edit(Category $id)
    {
        return view('pages.admin.edit_category', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $image = $request->file('image');

        if ($image) {
            $image_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image->move($upload_path, $image_full_name);
            $image_url = $upload_path . $image_full_name;

            Category::where('id', $id->id)
                ->update([
                    'category_name' => $request->name,
                    'status' => 1,
                    'image' => $image_url
                ]);
        } else {
            Category::where('id', $id->id)
                ->update([
                    'category_name' => $request->name,
                    'status' => 1,
                ]);
        }


        Session::flash('flash', 'Updated');
        return Redirect('/category-content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        Session::flash('flash', 'Deleted');
        return Redirect('/category-content');
    }

    public function unactive_category($id)
    {
        Category::where('id', $id)->update([
            'status' => 0
        ]);
        return Redirect::to('/category-content');
    }

    public function active_category($id)
    {
        Category::where('id', $id)->update([
            'status' => 1
        ]);
        return Redirect::to('/category-content');
    }
}
