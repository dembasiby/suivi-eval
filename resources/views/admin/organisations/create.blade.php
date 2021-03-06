@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.organisation.title_singular') }}
    </div>
    <div class="form-group">
        <a class="btn btn-default" href="{{ route('admin.organisations.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
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
               <label class="required" for="teams">Equipes</label> 
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div> 
               <select class="form-control select2 {{ $errors->has('teams') ? 'is-invalid' : '' }}" name="teams[]" id="teams" multiple required>
                   @foreach($teams as $id => $team)
                       <option value="{{ $id }}" {{ in_array($id, old('team_id', [])) ? 'selected' : '' }}>{{ $team }}</option>
                   @endforeach
               </select>
               @if($errors->has('team'))
                   <div class="invalid-feedback">
                        {{ $errors->first('team') }}                       
                   </div>
               @endif
               <span class="help-block">{{ trans('cruds.organisation.fields.team_helper') }}</span>
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
