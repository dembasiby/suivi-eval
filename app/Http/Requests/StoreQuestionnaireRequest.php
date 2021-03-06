<?php

namespace App\Http\Requests;

use App\Models\Questionnaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('questionnaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'     => [
                'string',
                'required',
            ],
            'annee'           => [
                'required',
                'integer',
                'min:2020',
                'max:2100',
            ],
            'trimestre'       => [
                'string',
                'required',
            ],
            // 'questions.*'     => [
            //      'integer',
            //  ],
            //  'questions'       => [
            //      'required',
            //      'array',
            //  ],
            // 'organisation_id' => [
            //            'required',
            //            'integer',
            //        ],
        ];
    }
}
