<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\Transaction;
use Illuminate\Support\Facades\Redirect;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = Shipping::get();
        return view('pages.admin.shipping', compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping = Shipping::find($id);
        $transaction = Transaction::with('rl_shipping', 'rl_product')->where('id_shipping', $id)->get();
        return view('pages.admin.detail_shipping', compact('shipping', 'transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function status_onPackaging($id)
    {
        Shipping::where('id', $id)->update([
            'on_packaging' => 1
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }

    public function status_notPackaging($id)
    {
        Shipping::where('id', $id)->update([
            'on_packaging' => null
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }

    public function status_onDelivery($id)
    {
        Shipping::where('id', $id)->update([
            'on_delivery' => 1
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }

    public function status_notDelivery($id)
    {
        Shipping::where('id', $id)->update([
            'on_delivery' => null
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }

    public function status_success($id)
    {
        Shipping::where('id', $id)->update([
            'success' => 1
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }

    public function status_notSuccess($id)
    {
        Shipping::where('id', $id)->update([
            'success' => null
        ]);

        return Redirect::to('/detail-shipping/' . $id);
    }
}
