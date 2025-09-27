<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'sub_category_id',
        'sub_sub_category_id',
        'price',
        'discount_price',
        'stock',
        'description',
        'variants',
        'product_details',
        'delivery_returns',
        'status',
        'images', // product-level images
    ];

    protected $casts = [
        'variants' => 'array',
        'product_details' => 'array',
        'delivery_returns' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function subSubCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_sub_category_id');
    }
}
