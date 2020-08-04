<?php

namespace App\Http\Requests;

use App\Models\Indicateur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIndicateurRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indicateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:indicateurs,id',
        ];
    }
}
