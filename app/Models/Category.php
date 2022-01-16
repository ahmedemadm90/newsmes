<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['en_name', 'ar_name', 'parent_id', 'active', 'img', 'hs_code', 'counter'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function machines()
    {
        return $this->hasMany(Machine::class, 'category_id');
    }
    /* protected $casts = [
        'hs_code'=>'array',
    ]; */

    use HasFactory;
}
