<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'likes');
    }

    public function getTotalLikesAttribute(){
        return count($this->Likes);
    }

    public function getuserLikeAttribute(){
        return count($this->Likes->where('id',Auth::user()->id));
    }


}
