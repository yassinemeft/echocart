<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model 
{
    use HasFactory;

    protected $fillable = ['asin', 'title', 'imgUrl', 'productURL', 'stars', 'price', 'category_id'];

}



