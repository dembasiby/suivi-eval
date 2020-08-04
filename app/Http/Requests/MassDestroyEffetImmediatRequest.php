<?php

namespace App\Http\Requests;

use App\Models\EffetImmediat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEffetImmediatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('effet_immediat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:effet_immediats,id',
        ];
    }
}
