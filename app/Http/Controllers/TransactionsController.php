<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::all();
        return view('pages.transactions.index', compact('items'));
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
        $items = Transaction::with('transaction_details.product_ordered')->findOrFail($id);
        // dd($items);

        return view('pages.transactions.show', compact('items'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaction::findOrFail($id);
        return view('pages.transactions.edit', compact('data'));
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
        // get input data
        $newData = $request->all();

        // update old data from input data
        $oldData = Transaction::findOrFail($id);
        $oldData->update($newData);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->delete();
        return redirect()->route('transaction.index');

    }

    public function setStatus(Request $request, $id) {

        $this->validate($request, [
            'status' => 'required|in:SUCCESS,FAILED,PENDING'
        ]);
        
        $item = Transaction::findOrFail($id);
        $item->transaction_status = $request->status;
        $item->save();
        
        return redirect()->route('transaction.index');
    }
}
