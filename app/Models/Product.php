<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
/**
 *
 * @OA\Schema(
 * required={"id,title"},
 * @OA\Xml(name="Movie"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", maxLength=32, readOnly="true", example="coche"),
 * @OA\Property(property="original_price", type="double", readOnly="true",  example="132"),
 * @OA\Property(property="discount_price", type="double", readOnly="true",  example="132"),
 * @OA\Property(property="sale", type="boolean", readOnly="true", example="true"),
 * @OA\Property(property="category_id", type="integer", readOnly="true", example="13"),
 * @OA\Property(property="img", type="string", maxLength=60, readOnly="true", example="imagen.jpg"),
 * @OA\Property(property="user_id", type="integer", readOnly="true", example="19"),
 * @OA\Property(property="created_at", type="string", readOnly="true", format="date-time", description="Datetime marker of verification status", example="2019-02-25 12:59:20"),
 * @OA\Property(property="updated_at", type="string", readOnly="true", format="date-time", description="Datetime marker of verification status", example="2019-02-25 12:59:20"),
 * )
 */

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
