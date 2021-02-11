<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\TransactionDetails;
use App\Models\Product;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request) {
        
        $data = $request->except('transaction_details');
        $data['uuid'] = 'IYN' . mt_rand(10000,99999) . mt_rand(100,999);

        // MEMBUAT TRANSAKSI BARU
        $transaction = Transaction::create($data);

        // MENAMBAHKAN DETAIL TRANSAKSI BARANG
        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetails([
                'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);

            // SETELAH ADA TRANSAKSI BARANG, MAKA QUANTITY/JUMLAH STOK DIKURANGI
            Product::find($product)->decrement('quantity');
        }

        $transaction->transaction_details()->saveMany($details);

        return ResponseFormatter::success($transaction, 'Transaksi Berhasil dibuat');

    }
}
