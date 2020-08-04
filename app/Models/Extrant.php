<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Extrant extends Model
{
    use SoftDeletes;

    public $table = 'extrants';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code_extrant',
        'description',
        'effet_immediat_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function extrantIndicateurs()
    {
        return $this->hasMany(Indicateur::class, 'extrant_id', 'id');
    }

    public function effet_immediat()
    {
        return $this->belongsTo(EffetImmediat::class, 'effet_immediat_id');
    }
}
