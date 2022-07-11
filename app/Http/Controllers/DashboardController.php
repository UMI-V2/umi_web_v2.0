<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show total user
        $totalUser = \App\Models\User::count();
        $totalUsaha = \App\Models\Business::count();
        $totalProduk = \App\Models\Product::count();
        $totalTransaksi = \App\Models\SalesTransaction::count();

        $transaksiAutoPayment = \App\Models\SalesTransaction::where('is_auto_payment', 1)->whereHas('transaction_status', function ($q) {
            $q->whereNotNull('tanggal_pesanan_diterima');
        })->sum('total_pesanan');
                
        $transaksiManualPayment = \App\Models\SalesTransaction::where('is_manual_payment', 1)->whereHas('transaction_status', function ($q) {
            $q->whereNotNull('tanggal_pesanan_diterima');
        })->sum('total_pesanan');

        return view('dashboard.index', compact('totalUser', 'totalUsaha', 'totalProduk', 'totalTransaksi', 'transaksiAutoPayment', 'transaksiManualPayment'));
    }

    public function popularPaymentMethod()
    {
        
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
        //
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
}
