<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    public function scopeFilter($query, array $filters)
    { // query - переменная запроса (в нашем случае posts)
        if (isset($filters['search'])) {
            $search = $filters['search'];
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('text', 'like', '%' . $search . '%');
        }
    }
}
