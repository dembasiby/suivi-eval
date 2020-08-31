<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Reponse extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'reponses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'question_id',
        'questionnaire_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected $casts = [
        'description' => 'array'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        Reponse::observe(new \App\Observers\ReponseActionObserver);
    }

    public function setDescriptionAttributes($value)
    {
        $description = [];

        foreach ($description as $ar_item) {
            if (gettype($ar_item) == object) {
                $has_null = [];

                foreach ($ar_item as $key => $value) {
                    if (is_null($value)) {
                        $has_null[] = $value;
                    }
                }

                if (count($has_null) == 0) {
                    $description[] = $ar_item;
                }
            } else {
                if (!is_null($ar_item)) {
                    $description[] = $ar_item;
                }
            }
        }

        $this->attributes['description'] = json_encode($description);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
