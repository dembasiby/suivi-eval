<?php

namespace App\Http\Requests;

use App\Models\Reponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReponseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reponse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'      => [
                'string',
                'required',
            ],
            'question_id'      => [
                'required',
                'integer',
            ],
            'questionnaire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
