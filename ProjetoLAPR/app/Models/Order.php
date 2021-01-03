<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function addProduct($product){
        if(is_string($product)){
            $product = Role::whereName($product)->firstOrFail();
        }
        $this->products()->syncWithoutDetaching($product);
    }

    public function deleteProduct($product){
        if(is_string($product)){
            $product = Role::whereName($product)->firstOrFail();
        }
        $this->products()->detach($product);
    }

    public function addPayment($payment){
        if(is_string($payment)){
            $payment = Role::whereName($payment)->firstOrFail();
        }
        $this->payment()->syncWithoutDetaching($payment);
    }
}
