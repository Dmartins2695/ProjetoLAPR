<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','family','type','brand','price','description', 'image','color'
    ];

    public function getPriceAttribute($value){
        return $value."€";
    }
}
