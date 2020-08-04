@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.question.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_question_id">{{ trans('cruds.question.fields.type_question') }}</label>
                <select class="form-control select2 {{ $errors->has('type_question') ? 'is-invalid' : '' }}" name="type_question_id" id="type_question_id" required>
                    @foreach($type_questions as $id => $type_question)
                        <option value="{{ $id }}" {{ old('type_question_id') == $id ? 'selected' : '' }}>{{ $type_question }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.type_question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.question.fields.recurrence') }}</label>
                @foreach(App\Models\Question::RECURRENCE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('recurrence') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="recurrence_{{ $key }}" name="recurrence" value="{{ $key }}" {{ old('recurrence', 'continue') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="recurrence_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('recurrence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recurrence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.recurrence_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indicateur_id">{{ trans('cruds.question.fields.indicateur') }}</label>
                <select class="form-control select2 {{ $errors->has('indicateur') ? 'is-invalid' : '' }}" name="indicateur_id" id="indicateur_id" required>
                    @foreach($indicateurs as $id => $indicateur)
                        <option value="{{ $id }}" {{ old('indicateur_id') == $id ? 'selected' : '' }}>{{ $indicateur }}</option>
                    @endforeach
                </select>
                @if($errors->has('indicateur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indicateur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.indicateur_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection