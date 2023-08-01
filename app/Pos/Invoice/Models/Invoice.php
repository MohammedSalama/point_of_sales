<?php

namespace Pos\Invoice\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pos\Category\Models\Category;
use Pos\Product\Models\Product;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
