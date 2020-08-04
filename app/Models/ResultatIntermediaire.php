<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ResultatIntermediaire extends Model
{
    use SoftDeletes;

    public $table = 'resultat_intermediaires';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code_resultat_intermediaire',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function resultatIntermediaireProblemeCentrals()
    {
        return $this->hasMany(ProblemeCentral::class, 'resultat_intermediaire_id', 'id');
    }
}
