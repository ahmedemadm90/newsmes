<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'vendor_id', 'machines_id', 'gallery', 'video', 'unit', 'unit_price', 'hs_code', 'counter'];
    public function machines($id)
    {
        $machine = Machine::find($id);
        return $machine;
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    protected $casts = [
        'machines_id' => 'array',
        'gallery' => 'array',
        'hs_code' => 'array',
    ];

}
