<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'imageUrl'
    ];

    public function scopeSearch($query,$search)
    {
        $query->where('name', 'like', '%' . $search . '%');
    }
}
