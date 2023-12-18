<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Symptom extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['diseases'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['symptoms'] ?? false, function ($query, $symptoms) {
            return $query->whereHas('symptoms', function ($query) use ($symptoms) {
                $query->where('slug', $symptoms);
            });
        });
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_symptom', 'symptom_id', 'disease_id')
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
