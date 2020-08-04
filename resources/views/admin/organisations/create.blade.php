@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.organisation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organisations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.organisation.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organisation.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sigle">{{ trans('cruds.organisation.fields.sigle') }}</label>
                <input class="form-control {{ $errors->has('sigle') ? 'is-invalid' : '' }}" type="text" name="sigle" id="sigle" value="{{ old('sigle', '') }}">
                @if($errors->has('sigle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sigle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organisation.fields.sigle_helper') }}</span>
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