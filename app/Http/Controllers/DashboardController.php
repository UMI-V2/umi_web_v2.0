<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\SalesTransaction;
use App\Models\Address;
use App\Helpers\ResponseFormatter;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\DB;
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
        $totalUser = User::count();
        $totalUsaha = Business::count();
        $totalProduk = Product::count();
        $totalTransaksi = SalesTransaction::count();

        $transaksiAutoPayment = SalesTransaction::where('is_auto_payment', 1)->whereHas('transaction_status', function ($q) {
            $q->whereNotNull('tanggal_pesanan_diterima');
        })->sum('total_pesanan');
                
        $transaksiManualPayment = SalesTransaction::where('is_manual_payment', 1)->whereHas('transaction_status', function ($q) {
            $q->whereNotNull('tanggal_pesanan_diterima');
        })->sum('total_pesanan');

        /**$transactionProduct = \App\Models\TransactionProduct::whereHas('transaction_status', function ($q) {
            $q->whereNotNull('tanggal_pesanan_diterima');
        })->get();
        */

        $transactionProduct = Product::all();
        $transactionProduct = $transactionProduct->sortByDesc(function($product){
            return $product->total_order;
        })->take(5);
        
        $totalLapakPopuler = Business::all();
        $totalLapakPopuler = $totalLapakPopuler->sortByDesc(function($business){
            return $business->total_order;
        })->take(5);
        
        $alamats = Address::all();
        $alamatToko = [];
        foreach ($alamats as $alamat) {
            $temp = $alamat->toArray();
            $alamatToko[] = array(
                array_values($temp)[5],
                array_values($temp)[13],
                array_values($temp)[14],
            );
        }
        
        $historiTransaksi = SalesTransaction::all()->take(5);


        
        // return dd(Product::find(3)->total_order);

        return view('dashboard.index', compact('totalUser', 'totalUsaha', 'totalProduk', 'totalTransaksi', 'transaksiAutoPayment', 'transaksiManualPayment', 'transactionProduct', 'totalLapakPopuler', 'historiTransaksi', 'alamatToko'));
    }

    public function FrekuensiTransaksi()
    {
        $transaksiPerBulan = TransactionStatus::select(DB::raw('monthname(tanggal_pesanan_diterima) as bulan'), DB::raw('count(*) as jumlah'))->groupBy('bulan')->get();

        return response()->json([
            'data' => $transaksiPerBulan
        ]);
        // return dd($transaksiPerBulan);
        
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