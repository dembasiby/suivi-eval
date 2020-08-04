<?php

namespace App\Http\Requests;

use App\Models\Organisation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganisationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('organisation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nom'   => [
                'string',
                'required',
                'unique:organisations',
            ],
            'sigle' => [
                'string',
                'nullable',
            ],
        ];
    }
}
