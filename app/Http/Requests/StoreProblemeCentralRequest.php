<?php

namespace App\Http\Requests;

use App\Models\ProblemeCentral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProblemeCentralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('probleme_central_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_probleme_central'     => [
                'string',
                'required',
            ],
            'description'               => [
                'string',
                'required',
                'unique:probleme_centrals',
            ],
            'resultat_intermediaire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
