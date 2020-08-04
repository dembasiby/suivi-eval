<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use SoftDeletes;

    public $table = 'organisations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'sigle',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function indicateurs()
    {
        return $this->belongsToMany(Indicateur::class);
    }

    public function reponses()
    {
        return $this->hasManyThrough(Reponse::class, Questionnaire::class);
    }
	
	public function teams()
	{
		$this->belongsToMany(Team::class)->withTimeStamps();
	}
}
