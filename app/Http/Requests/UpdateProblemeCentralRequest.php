<?php

namespace App\Http\Requests;

use App\Models\ProblemeCentral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProblemeCentralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('probleme_central_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:probleme_centrals,description,' . request()->route('probleme_central')->id,
            ],
            'resultat_intermediaire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
