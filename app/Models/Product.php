<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $felable = [
        'cat_id',
        'name',
        'slug',
        'small_description',
        'description',
        'originale_price',
        'selling_price',
        'image',
        'qte',
        'taxss',
        'status',
        'trending',
        'meta_title',
        'meta_Keywords',
        'meta_description',
    ];
    public function category()
    {

        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
