<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class EffetImmediat extends Model
{
    use SoftDeletes;

    public $table = 'effet_immediats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code_effet_immediat',
        'description',
        'effet_intermediaire_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function effetImmediatExtrants()
    {
        return $this->hasMany(Extrant::class, 'effet_immediat_id', 'id');
    }

    public function effet_intermediaire()
    {
        return $this->belongsTo(EffetIntermediaire::class, 'effet_intermediaire_id');
    }
}
