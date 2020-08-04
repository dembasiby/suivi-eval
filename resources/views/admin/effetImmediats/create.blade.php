@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.effetImmediat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.effet-immediats.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_effet_immediat">{{ trans('cruds.effetImmediat.fields.code_effet_immediat') }}</label>
                <input class="form-control {{ $errors->has('code_effet_immediat') ? 'is-invalid' : '' }}" type="text" name="code_effet_immediat" id="code_effet_immediat" value="{{ old('code_effet_immediat', '') }}" required>
                @if($errors->has('code_effet_immediat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_effet_immediat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.effetImmediat.fields.code_effet_immediat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.effetImmediat.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.effetImmediat.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="effet_intermediaire_id">{{ trans('cruds.effetImmediat.fields.effet_intermediaire') }}</label>
                <select class="form-control select2 {{ $errors->has('effet_intermediaire') ? 'is-invalid' : '' }}" name="effet_intermediaire_id" id="effet_intermediaire_id" required>
                    @foreach($effet_intermediaires as $id => $effet_intermediaire)
                        <option value="{{ $id }}" {{ old('effet_intermediaire_id') == $id ? 'selected' : '' }}>{{ $effet_intermediaire }}</option>
                    @endforeach
                </select>
                @if($errors->has('effet_intermediaire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('effet_intermediaire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.effetImmediat.fields.effet_intermediaire_helper') }}</span>
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