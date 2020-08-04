<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ProblemeCentral extends Model
{
    use SoftDeletes;

    public $table = 'probleme_centrals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code_probleme_central',
        'description',
        'resultat_intermediaire_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function resultat_intermediaire()
    {
        return $this->belongsTo(ResultatIntermediaire::class, 'resultat_intermediaire_id');
    }
}
