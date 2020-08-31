<?php

namespace App\Http\Requests;

use App\Models\Reponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReponseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
         $data = [];
        /* dd(request()->all()['reponses']); */
        for ($i = 0; $i < count(request()->all()['reponses']); $i++) {

            $prev = ($i > 0) ? ($i - 1) : 0;

            $data[] = request()->validate([
                'reponses.' . $i . '.questionnaire_id' => 'required',
                'reponses.' . $i . '.question_id' => 'required',
                'reponses.' . $i . '.description' => 'required_unless:reponses.' . $prev . '.description,non',
                'reponses.' . $i . '.description.*' => 'required_unless:reponses.' . $prev . '.description,non',
            ]);
        }
        return [
             // 'description'      => [
//                  'string',
//                  'required',
             ],
            // 'question_id'      => [
//                 'required',
//                 'integer',
//             ],
//             'questionnaire_id' => [
//                 'required',
//                 'integer',
//             ],
        ];
    }
}
