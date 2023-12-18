<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseSymptom extends Model
{
    use HasFactory;

    protected $table = 'disease_symptom';

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%');
        });

        $query->when($filters['diseasesymptom'] ?? false, function ($query, $diseasesymptom) {
            return $query->whereHas('diseasesymptom', function ($query) use ($diseasesymptom) {
                $query->where('id', $diseasesymptom);
            });
        });
    }
}
