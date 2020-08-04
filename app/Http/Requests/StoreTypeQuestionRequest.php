<?php

namespace App\Http\Requests;

use App\Models\TypeQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
        ];
    }
}
