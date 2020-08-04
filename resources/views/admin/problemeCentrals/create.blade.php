@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.problemeCentral.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.probleme-centrals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_probleme_central">{{ trans('cruds.problemeCentral.fields.code_probleme_central') }}</label>
                <input class="form-control {{ $errors->has('code_probleme_central') ? 'is-invalid' : '' }}" type="text" name="code_probleme_central" id="code_probleme_central" value="{{ old('code_probleme_central', '') }}" required>
                @if($errors->has('code_probleme_central'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_probleme_central') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.problemeCentral.fields.code_probleme_central_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.problemeCentral.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.problemeCentral.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="resultat_intermediaire_id">{{ trans('cruds.problemeCentral.fields.resultat_intermediaire') }}</label>
                <select class="form-control select2 {{ $errors->has('resultat_intermediaire') ? 'is-invalid' : '' }}" name="resultat_intermediaire_id" id="resultat_intermediaire_id" required>
                    @foreach($resultat_intermediaires as $id => $resultat_intermediaire)
                        <option value="{{ $id }}" {{ old('resultat_intermediaire_id') == $id ? 'selected' : '' }}>{{ $resultat_intermediaire }}</option>
                    @endforeach
                </select>
                @if($errors->has('resultat_intermediaire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('resultat_intermediaire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.problemeCentral.fields.resultat_intermediaire_helper') }}</span>
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