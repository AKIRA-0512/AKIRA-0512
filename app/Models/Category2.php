<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category2 extends Model
{
    use HasFactory;
    
    public function getByCategory(int $limit_count = 5)
    {
         return $this->posts()->with('category2s')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
