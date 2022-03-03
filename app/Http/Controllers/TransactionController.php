<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Capital;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();
        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create');
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
            'code' => 'required',
            'vendor_price' => 'required',
            'sell_price' => 'required',
        ]);

        $latest = Transaction::select(['balance', 'profit'])->latest()->first();
        $balance = $latest->balance - $request->vendor_price;
        $difference = $request->sell_price - $request->vendor_price;
        $profit = $latest->profit + $difference;

        Transaction::create([
            'code' => $request->code,
            'vendor_price' => $request->vendor_price,
            'sell_price' => $request->sell_price,
            'difference' => $difference,
            'balance' => $balance,
            'profit' => $profit
        ]);

        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        return view('transaction.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        return redirect()->route('transaction.index');
    }
}
