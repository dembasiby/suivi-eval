<?php

namespace App\Http\Requests;

use App\Models\ResultatIntermediaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateResultatIntermediaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('resultat_intermediaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_resultat_intermediaire' => [
                'string',
                'required',
            ],
            'description'                 => [
                'string',
                'required',
                'unique:resultat_intermediaires,description,' . request()->route('resultat_intermediaire')->id,
            ],
        ];
    }
}
