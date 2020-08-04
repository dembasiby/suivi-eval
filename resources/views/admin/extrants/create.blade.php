@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.extrant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.extrants.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_extrant">{{ trans('cruds.extrant.fields.code_extrant') }}</label>
                <input class="form-control {{ $errors->has('code_extrant') ? 'is-invalid' : '' }}" type="text" name="code_extrant" id="code_extrant" value="{{ old('code_extrant', '') }}" required>
                @if($errors->has('code_extrant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_extrant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.extrant.fields.code_extrant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.extrant.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.extrant.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="effet_immediat_id">{{ trans('cruds.extrant.fields.effet_immediat') }}</label>
                <select class="form-control select2 {{ $errors->has('effet_immediat') ? 'is-invalid' : '' }}" name="effet_immediat_id" id="effet_immediat_id" required>
                    @foreach($effet_immediats as $id => $effet_immediat)
                        <option value="{{ $id }}" {{ old('effet_immediat_id') == $id ? 'selected' : '' }}>{{ $effet_immediat }}</option>
                    @endforeach
                </select>
                @if($errors->has('effet_immediat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('effet_immediat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.extrant.fields.effet_immediat_helper') }}</span>
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