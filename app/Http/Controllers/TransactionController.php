<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $locations = Location::all();
        return view('pages.transaction', compact('transactions'), compact('locations'));
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
        // $request->validate([
        //     "name" => 'required',
        //     'Phone_number' => 'required',
        //     "resiver_name" => 'required',
        //     "resiver_number" => 'required',
        //     "commission" => 'required',
        //     "location" => 'required',
            
        // ]);
        Transaction::create([
            "user_name" => Auth::user()->name,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'resiver_name' => $request->resiver_name,
            'resiver_number' => $request->resiver_number,
            'commission' => $request->commission,
            'location' => $request->location,
            'value_status' => "1",
            'reason' => $request->reason,
            'note' => $request->note,
            'total' => $request->total,

        ]);
        session()->flash('Add', 'تمت إضافة الفاتورة بنجاح');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
