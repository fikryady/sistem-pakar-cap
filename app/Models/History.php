<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['historise'] ?? false, function ($query, $historise) {
            return $query->whereHas('historise', function ($query) use ($historise) {
                $query->where('id', $historise);
            });
        });
    }
}
