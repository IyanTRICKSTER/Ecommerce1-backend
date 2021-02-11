<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Transaction;
// use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'product_id',
    ];

    protected $hidden = [

    ];

    public function transaction() {
        // RELASI MODEL PRODUCT KE MODEL TRANSACTION
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function product_ordered() {
        // RELASI MODEL PRODUCT KE MODEL PRODUCT
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
