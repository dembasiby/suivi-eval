<?php

namespace App\Http\Requests;

use App\Models\Indicateur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIndicateurRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indicateur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_indicateur' => [
                'string',
                'max:20',
                'required',
                'unique:indicateurs,code_indicateur,' . request()->route('indicateur')->id,
            ],
            'description'     => [
                'string',
                'required',
            ],
            'organisations.*' => [
                'integer',
            ],
            'organisations'   => [
                'required',
                'array',
            ],
        ];
    }
}
