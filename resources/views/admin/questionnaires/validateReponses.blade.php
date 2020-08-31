@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
	{{ trans('global.show') }} {{ trans('cruds.questionnaire.title') }}
    </div>
    <div class="">
        <form action="{{ route("admin.questionnaires.updateStatus", [$questionnaire->id]) }}" method="post" accept-charset="utf-8">
          @csrf 
	  @method('patch')
          <select name="statut" id="statut" size="1">
              <option disabled selected value>-- Selectionner une option --</option>
              <option value="4">Valider le questionnaire</option>
              <option value="2">Retourner le questionnaire en mode control</option>
          </select>
		  		<button class="btn btn-primary" type="submit">Mettre le statut à jour</button>
       </form> 
    </div>

    <div class="card-body">
	<div class="form-group" disabled>
	    <div class="form-group">
		<a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
		{{ trans('global.back_to_list') }}
		</a>
	    </div>
	    <div class="row" id="name">
		<div >
		    {{ trans('cruds.questionnaire.fields.id') }}
		</div>
		<div>
		    {{ $questionnaire->id }}
		</div>
	    </div>
	    <div class="row" id="name">
		<div >
		    {{ trans('cruds.questionnaire.fields.description') }}
		</div>
		<div>
		    {{ $questionnaire->description }}
		</div>
	    </div>
	    <div class="row">
		<div>
		    {{ trans('cruds.questionnaire.fields.annee') }}
		</div>
		<div>
		    {{ $questionnaire->annee }}
		</div>
	    </div>
	    <div class="row">
		<div>
		    {{ trans('cruds.questionnaire.fields.trimestre') }}
		</div>
		<div>
		    {{ $questionnaire->trimestre }}
		</div>
	    </div>
	    <div class="row">
		<div>
		    {{ trans('cruds.questionnaire.fields.organisation') }}
		</div>
		<div>
		    {{ $questionnaire->organisation->sigle ?? '' }}
		</div>
	    </div>
	</div>	           

	<form action="{{ route('admin.questionnaires.updateReponses', $questionnaire->id)}}" method="post" accept-charset="utf-8">
	@csrf
	@method('put')
	@for ($i = 0; $i < count($reponses); $i++)							    
	<div id="" class="form-group" >
	<label for="" class="label label-info">{{ $reponses[$i]->question->description }}</label>

	@if( $reponses[$i]->question->type_question->type == 'object') 
	<table class="table">
	<thead>
	<tr>
	    @foreach($reponses[$i]->question->options as $option)
	<th scope="col">{{ $option }}</th>
	@endforeach
	</tr>
	</thead>
	<tbody>	
	<tr>
	    @foreach($reponses[$i]->question->options as $option)
	@if (Str::startsWith($option, 'Nombre'))
	<td> <input class="form-control" type="number" name="description[{{ $i }}][{{$option}}]" value="{{ $reponses[$i]->description[$option] ?? ''}}" id=""> </td>													
	@elseif (Str::startsWith($option, 'Date'))
	<td><input class="form-control" type="date" name="description[{{ $i }}][{{$option}}]" value="{{ $reponses[$i]->description[$option] ?? ''}}" id=""></td>
	@else
	<td> <input class="form-control" type="text" name="description[{{ $i }}][{{$option}}]" value="{{ $reponses[$i]->description[$option] ?? ''}}" id=""> </td>
	@endif
	@endforeach
	</tr>  
	</tbody>
	</table>
    @elseif( $reponses[$i]->question->type_question->type == 'radio')
	<div class="form-check form-check-inline">
	<input class="form-check-input" type="radio" name="description[{{ $i }}]" value="oui" {{ $reponses[$i]->description === 'oui' ? 'checked' : ''  }} id="">Oui 
	<input class="form-check-input" type="radio" name="description[{{ $i }}]" value="non" {{ $reponses[$i]->description === 'non' ? 'checked' : ''  }} id=""> Non
	</div>
    @elseif( $reponses[$i]->question->type_question->type == 'date')
	<div id="">
	<input class="form-control" type="date" name="description[{{ $i }}]" value="{{ $reponses[$i]->description ?? '' }}" id="">
	</div>
    @elseif( $reponses[$i]->question->type_question->type == 'number')
	<div id="">
	<input class="form-control" type="number" name="description[{{ $i }}]" value="{{ $reponses[$i]->description ?? '' }}" id="">
	</div>
    @elseif( $reponses[$i]->question->type_question->type == 'text')
	<div id="">
	<input class="form-control" type="text" name="description[{{ $i }}]" value="{{ $reponses[$i]->description ?? '' }}" id="">
	</div>
    @elseif( $reponses[$i]->question->type_question->type == 'textarea')
	<div id="">
	<textarea class="form-control" name="description[{{ $i }}]" value="{{ $reponses[$i]->description ?? ''}}" id=""></textarea>
	</div>
	@endif
	</div>

	<br>
	@endfor
	<button disabled class="btn btn-primary" type="submit">Soumettre</button>
	</form>

	<div class="form-group">
	<a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
	{{ trans('global.back_to_list') }}
	</a>
	</div>
    </div>
</div>





@endsection
