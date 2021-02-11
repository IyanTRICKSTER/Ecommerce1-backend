<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\Models\Product;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'photo',
        'is_default'
    ];

    protected $hidden = [

    ];

    public function product() {
        // RELASI MODEL PRODUCT KE MODEL PRODUCT GALLERIES - One To Many Relation 
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function getPhotoAttribute($value) {
        return url('storage/' . $value);
    }
}
