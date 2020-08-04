<?php

namespace App\Http\Requests;

use App\Models\ResultatIntermediaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyResultatIntermediaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('resultat_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:resultat_intermediaires,id',
        ];
    }
}
