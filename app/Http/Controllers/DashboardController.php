<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function __construct()
    {
        // authenticate the user
        $this->middleware('auth');
    }

    public function index() {

        // $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $income = Transaction::with('transaction_details.product_ordered')->where('transaction_status', 'SUCCESS')->get();  // dd($income);
        // dd($income);

        // ACCESSING THE COLLECTION of TRANSACTION_DETAILS
        $transaction_details = array();
        $transaction_total = array();
        for($i = 0; $i < $income->count(); $i++) {
            array_push($transaction_details, $income[$i]['transaction_details']);
            array_push($transaction_total, $income[$i]['transaction_total']);
        }

        // ENTERING PRODUCT RELATION
        $product_ordered = array();
        for($i = 0; $i < count($transaction_details); $i++) {
            for($j = 0; $j < count($transaction_details[$i]); $j++ ) {
                array_push($product_ordered, $transaction_details[$i][$j]['product_ordered']);
            }
        }
        // dd($product_ordered);

        foreach ($product_ordered as $val) {
            $a[] = $val->price;
        }
        // dd(array_sum($a));

        //TOTAL PEMASUKAN
        $income = array_sum($a);
        

        $total_sold_product = array_sum($transaction_total);
        $sold_product = Transaction::orderBy('id', 'DESC')->take(5)->get();

        $pie = [
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
        ];
    
        return view("pages.dashboard", compact(['income','total_sold_product','sold_product','pie']));
    }
}
