<?php

namespace App\Http\Requests;

use App\Models\EffetImmediat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEffetImmediatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('effet_immediat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_effet_immediat'    => [
                'string',
                'max:20',
                'required',
            ],
            'description'            => [
                'string',
                'required',
            ],
            'effet_intermediaire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
