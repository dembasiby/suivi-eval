<?php

namespace App\Http\Requests;

use App\Models\EffetIntermediaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEffetIntermediaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('effet_intermediaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'        => [
                'string',
                'required',
                'unique:effet_intermediaires',
            ],
            'description' => [
                'string',
                'required',
            ],
        ];
    }
}
