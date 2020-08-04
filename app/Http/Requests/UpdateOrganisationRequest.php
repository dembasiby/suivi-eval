<?php

namespace App\Http\Requests;

use App\Models\Organisation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrganisationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('organisation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nom'   => [
                'string',
                'required',
                'unique:organisations,nom,' . request()->route('organisation')->id,
            ],
            'sigle' => [
                'string',
                'nullable',
            ],
        ];
    }
}
