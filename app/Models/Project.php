<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'user_id', 'categories_id', 'tech_id', 'machines_id', 'materials_id', 'field_id', 'idea_id', 'emps', 'space', 'startup_cost',
        'free_space1', 'free_space2', 'free_space3', 'video', 'gallery', 'about', 'hs_code', 'counter'
    ];
    protected $casts = [
        'gallery' => 'array',
        'machines_id' => 'array',
        'materials_id' => 'array',
        'categories_id' => 'array',
        'hs_code' => 'array',
    ];
    public function categories($id)
    {
        $category = Category::where('id', $id)->first();
        return $category;
    }
    public function machines($id)
    {
        $machine = Machine::where('id', $id)->first();
        return $machine;
    }
    public function user($id)
    {
        $user = User::find($id);
        return $user;
    }
    Static function StaticUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}
