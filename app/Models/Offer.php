<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getProduct(){
       return Product::findOrFail($this->product_id);
    }
    public function getUser(){
        return User::findOrFail($this->user_id);
    }

    public function getSituationAttribute(){
        if (!isset($this->accepted)){
            return 'Not anwser yet';
        }
        return $this->accepted?'Accepted':'Reject';
    }


}
