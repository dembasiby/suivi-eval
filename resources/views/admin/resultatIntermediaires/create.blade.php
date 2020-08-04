@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.resultatIntermediaire.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.resultat-intermediaires.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_resultat_intermediaire">{{ trans('cruds.resultatIntermediaire.fields.code_resultat_intermediaire') }}</label>
                <input class="form-control {{ $errors->has('code_resultat_intermediaire') ? 'is-invalid' : '' }}" type="text" name="code_resultat_intermediaire" id="code_resultat_intermediaire" value="{{ old('code_resultat_intermediaire', '') }}" required>
                @if($errors->has('code_resultat_intermediaire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_resultat_intermediaire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.resultatIntermediaire.fields.code_resultat_intermediaire_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.resultatIntermediaire.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.resultatIntermediaire.fields.description_helper') }}</span>
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