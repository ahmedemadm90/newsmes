<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'category_id', 'vendor_id', 'gallery', 'video', 'price', 'hs_code', 'counter'
    ];
    protected $casts = [
        'categories_id' => 'array',
        'gallery' => 'array',
        'hs_code' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
