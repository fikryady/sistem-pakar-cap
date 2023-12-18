<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Disease extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['diseases'] ?? false, function ($query, $diseases) {
            return $query->whereHas('diseases', function ($query) use ($diseases) {
                $query->where('slug', $diseases);
            });
        });
    }

    public function symptoms()
    {
        return $this->belongsToMany(
            Symptom::class,
            'disease_symptom',
            'disease_id',
            'symptom_id'
        )
            ->withPivot('bobot')
            ->withTimestamps();
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
