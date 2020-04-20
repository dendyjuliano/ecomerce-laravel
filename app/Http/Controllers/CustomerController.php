<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('roles')->where('role_id', 2)->get();
        return view('pages.admin.user', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('pages.admin.add_user', compact('role'));
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
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        Customer::create($request->all());
        Session::flash('flash', 'Created');
        return Redirect('/user-content');
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
    public function edit(Customer $id)
    {
        $role = Role::all();
        return view('pages.admin.edit_user', compact('id', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        Customer::where('id', $id->id)
            ->update([
                'email' => $request->email,
                'name' => $request->name,
                'password' => $request->password,
                'role_id' => $request->role_id,
            ]);

        Session::flash('flash', 'Updated');
        return Redirect('/user-content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        Session::flash('flash', 'Deleted');
        return Redirect('/user-content');
    }
}
