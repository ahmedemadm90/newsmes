<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsCode extends Model
{
    protected $fillable = [
        'code','parent_id','details',
    ];
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(HsCode::class, 'parent_id');
    }
    use HasFactory;
}
