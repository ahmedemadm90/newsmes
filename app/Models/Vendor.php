<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'mobile', 'address', 'owner_name', 'owner_mobile', 'tax_record', 'active', 'hs_code', 'counter'
    ];
}
