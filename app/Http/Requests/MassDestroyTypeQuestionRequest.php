<?php

namespace App\Http\Requests;

use App\Models\TypeQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:type_questions,id',
        ];
    }
}
