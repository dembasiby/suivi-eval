<?php

namespace App\Http\Requests;

use App\Models\EffetIntermediaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEffetIntermediaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('effet_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:effet_intermediaires,id',
        ];
    }
}
