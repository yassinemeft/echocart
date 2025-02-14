<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Product extends Model 
{
    use HasFactory;

    protected $fillable = ['asin', 'owner_id', 'title', 'imgUrl', 'productURL', 'stars', 'price', 'category_id'];



    /**
     * The user that owns the product.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}



