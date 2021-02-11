<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    public function get($id) {
        $product = Transaction::with(['transaction_details.product_ordered'])->find($id);

        if($product)
            return ResponseFormatter::success($product, 'Data Transaksi Berhasil Diambil ');
        else
            return ResponseFormatter::error(null, 'Data Transaksi Tidak ada!', 404);
    }
}
