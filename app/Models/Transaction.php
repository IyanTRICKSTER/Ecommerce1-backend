<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\TransactionDetails;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'address',
        'transaction_total',
        'transaction_status',
    ];

    protected $hidden = [

    ];

    public function transaction_details() {
        // RELASI MODEL PRODUCT KE MODEL TRANSACTION_DETAIL
        return $this->hasMany(TransactionDetails::class, 'transaction_id');
    }
}
