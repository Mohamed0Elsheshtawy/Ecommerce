<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'price',
        'sale',
        'title',
        'default_imge',
        'category',
        'desc',
        'rate',
    ];
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
    //public function Productimage()
    //{
    //    return $this->belongsTo(ProductImage::class ,'image_id');
    //}

}
