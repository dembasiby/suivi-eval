@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.indicateur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.indicateurs.update", [$indicateur->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code_indicateur">{{ trans('cruds.indicateur.fields.code_indicateur') }}</label>
                <input class="form-control {{ $errors->has('code_indicateur') ? 'is-invalid' : '' }}" type="text" name="code_indicateur" id="code_indicateur" value="{{ old('code_indicateur', $indicateur->code_indicateur) }}" required>
                @if($errors->has('code_indicateur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_indicateur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indicateur.fields.code_indicateur_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.indicateur.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $indicateur->description) }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indicateur.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="probleme_central_id">{{ trans('cruds.indicateur.fields.probleme_central') }}</label>
                <select class="form-control select2 {{ $errors->has('probleme_central') ? 'is-invalid' : '' }}" name="probleme_central_id" id="probleme_central_id">
                    @foreach($probleme_centrals as $id => $probleme_central)
                        <option value="{{ $id }}" {{ ($indicateur->probleme_central ? $indicateur->probleme_central->id : old('probleme_central_id')) == $id ? 'selected' : '' }}>{{ $probleme_central }}</option>
                    @endforeach
                </select>
                @if($errors->has('probleme_central'))
                    <div class="invalid-feedback">
                        {{ $errors->first('probleme_central') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indicateur.fields.probleme_central_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extrant_id">{{ trans('cruds.indicateur.fields.extrant') }}</label>
                <select class="form-control select2 {{ $errors->has('extrant') ? 'is-invalid' : '' }}" name="extrant_id" id="extrant_id">
                    @foreach($extrants as $id => $extrant)
                        <option value="{{ $id }}" {{ ($indicateur->extrant ? $indicateur->extrant->id : old('extrant_id')) == $id ? 'selected' : '' }}>{{ $extrant }}</option>
                    @endforeach
                </select>
                @if($errors->has('extrant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extrant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indicateur.fields.extrant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organisations">{{ trans('cruds.indicateur.fields.organisation') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('organisations') ? 'is-invalid' : '' }}" name="organisations[]" id="organisations" multiple required>
                    @foreach($organisations as $id => $organisation)
                        <option value="{{ $id }}" {{ (in_array($id, old('organisations', [])) || $indicateur->organisations->contains($id)) ? 'selected' : '' }}>{{ $organisation }}</option>
                    @endforeach
                </select>
                @if($errors->has('organisations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organisations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indicateur.fields.organisation_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="team_id">Equipes</label>
                <select class="form-control select2 {{ $errors->has('team_id') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required >
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{ $indicateur->team ? $indicateur->team->id : old('team_id' ) == $id ? 'selected' : '' }}>{{ $team }}</option> 
                   @endforeach
                </select>
                @if($errors->has('team_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team_id') }}
                    </div>
                @endif
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
