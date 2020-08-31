<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Question extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RECURRENCE_RADIO = [
        'unique'   => 'Unique',
        'continue' => 'Continue',
    ];

    protected $fillable = [
        'description',
        'type_question_id',
        'recurrence',
        'indicateur_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
        'options'
    ];

    protected $casts = ['options' => 'array'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function type_question()
    {
        return $this->belongsTo(TypeQuestion::class, 'type_question_id');
    }

    public function indicateur()
    {
        return $this->belongsTo(Indicateur::class, 'indicateur_id');
    }

    public function questionnaires()
    {
        return $this->belongsToMany(Questionnaire::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'question_id');
    }
}
