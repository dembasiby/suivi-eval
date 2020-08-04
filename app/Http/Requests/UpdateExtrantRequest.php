<?php

namespace App\Http\Requests;

use App\Models\Extrant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExtrantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('extrant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_extrant'      => [
                'string',
                'max:20',
                'required',
                'unique:extrants,code_extrant,' . request()->route('extrant')->id,
            ],
            'description'       => [
                'string',
                'required',
            ],
            'effet_immediat_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
