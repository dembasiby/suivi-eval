<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'      => [
                'string',
                'required',
            ],
            'type_question_id' => [
                'required',
                'integer',
            ],
            'recurrence'       => [
                'required',
            ],
            'indicateur_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
