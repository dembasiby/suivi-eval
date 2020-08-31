<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Questionnaire extends Model
{
    use SoftDeletes; //MultiTenantModelTrait;

    public $table = 'questionnaires';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'annee',
        'trimestre',
        'organisation_id',
        'statut',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
