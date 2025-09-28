<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name','sku','category_id','sub_category_id','sub_sub_category_id',
    'price','discount_price','stock','description',
    'variants','images','product_details','delivery_returns','status'
    ];

    protected $casts = [
       'variants' => 'array',
    'images' => 'array',
    'product_details' => 'array',
    'delivery_returns' => 'array',
    'price' => 'decimal:2',
    'discount_price' => 'decimal:2',
    ];

    // Relationships

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

    // Helper to get full category path
    public function getFullCategoryAttribute(): string
    {
        $categories = [
            $this->category->name ?? null,
            $this->subCategory->name ?? null,
            $this->subSubCategory->name ?? null,
        ];

        return implode(' > ', array_filter($categories));
    }
}
