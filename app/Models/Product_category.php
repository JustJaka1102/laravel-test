<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    /** @use HasFactory<\Database\Factories\ProductCategoryFactory> */
    use HasFactory;
    public $table = "product_category";
    protected $fillable = [
        'name',
        'parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Product_category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Product_category::class, 'parent_id');
    }
}
