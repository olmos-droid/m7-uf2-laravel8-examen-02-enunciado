<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use  HasFactory;
    
    public function scopeName($query, $input)
    {
        return $query->where('name', 'LIKE', "%" . $input . "%");
    }
    public function scopeId($query, $input)
    {
        return $query->where('id', '=', $input);
    }
    public function scopeStock($query, $quantity, $id)
    {
        return $query->where('id', '=', $id)->where('stock', '>=', $quantity);
    }
}
