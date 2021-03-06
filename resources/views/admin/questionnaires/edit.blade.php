@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.questionnaire.title_singular') }}
    </div>
    <div class="form-group">
        <a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questionnaires.update", [$questionnaire->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.questionnaire.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $questionnaire->description) }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionnaire.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="annee">{{ trans('cruds.questionnaire.fields.annee') }}</label>
                <input class="form-control {{ $errors->has('annee') ? 'is-invalid' : '' }}" type="number" name="annee" id="annee" value="{{ old('annee', $questionnaire->annee) }}" step="1" required>
                @if($errors->has('annee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('annee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionnaire.fields.annee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="trimestre">{{ trans('cruds.questionnaire.fields.trimestre') }}</label>
                <input class="form-control {{ $errors->has('trimestre') ? 'is-invalid' : '' }}" type="text" name="trimestre" id="trimestre" value="{{ old('trimestre', $questionnaire->trimestre) }}" required>
                @if($errors->has('trimestre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trimestre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionnaire.fields.trimestre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="questions">{{ trans('cruds.questionnaire.fields.question') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('questions') ? 'is-invalid' : '' }}" name="questions[]" id="questions" multiple required>
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ (in_array($id, old('questions', [])) || $questionnaire->questions->contains($id)) ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('questions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('questions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionnaire.fields.question_helper') }}</span>
            </div>
			
            <div class="form-group">
                <label class="required" for="organisation">Organisation</label>
                <input class="form-control {{ $errors->has('organisation_id') ? 'is-invalid' : '' }}" type="text" name="organisation" id="trimestre" value="{{ old('organisation_id', $questionnaire->organisation->nom) }}" disabled required>
                @if($errors->has('organisation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organisation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionnaire.fields.organisation_helper') }}</span>
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