@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionnaire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.id') }}
                        </th>
                        <td>
                            {{ $questionnaire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.description') }}
                        </th>
                        <td>
                            {{ $questionnaire->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.annee') }}
                        </th>
                        <td>
                            {{ $questionnaire->annee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.trimestre') }}
                        </th>
                        <td>
                            {{ $questionnaire->trimestre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Questions
                        </th>
                        <td>
							<form action="{{ route('admin.questionnaires.storeReponses', $questionnaire->id)}}" method="post" accept-charset="utf-8">
      {{ csrf_field() }}
								@for ($i = 0; $i < count($questionnaire->questions); $i++)								
				                <input type="hidden" name="reponses[{{ $i }}][question_id]" value="{{ $questionnaire->questions[$i]->id }}">
				                <input type="hidden" name="reponses[{{ $i }}][questionnaire_id]" value="{{ $questionnaire->id }}">
								
								  <div id="" class="form-group" >
                                	<label for="" class="label label-info">{{ $questionnaire->questions[$i]->description }}</label>
										 @if( ($questionnaire->questions[$i]->type_question)->type == 'object')
										 <table class="table">
										 	<thead>
										 		<tr>
										  @foreach($questionnaire->questions[$i]->options as $option)
										 			<th scope="col">{{ $option }}</th>
										  @endforeach
								 		</tr>
										 	</thead>
										 	<tbody>
                                                @if($questionnaire->questions[$i]->sub_options != null)
                                                    @foreach($questionnaire->questions[$i]->sub_options as $sub_option)
                                                    <tr>
                                                        @for ($j = 0; $j < count($questionnaire->questions[$i]->options); $j++)
                                                            @if ($j == 0)
                                                                <td> <input class="form-control" type="text" name="reponses[{{ $i }}][description][{{ $questionnaire->questions[$i]->options[$j] }}]" value="{{ $sub_option }}"></td>
                                                            @else
                                                                @if (Str::startsWith($questionnaire->questions[$i]->options[$j], 'Nombre'))
                                                                <td> <input class="form-control" type="number" name="reponses[{{ $i }}][description][{{ $questionnaire->questions[$i]->options[$j] }}]" value="{{ old('reponses['.$i.']description', '') }}" id="some_name"> </td>													
                                                                @elseif (Str::startsWith($questionnaire->questions[$i]->options[$j], 'Date'))
                                                                <td><input class="form-control" type="date" name="reponses[{{ $i }}][description][{{ $questionnaire->questions[$i]->options[$j] }}]" value="{{ old('reponses['.$i.'][description]'. $questionnaire->questions[$i]->options[$j] ) }}" id=""></td>
                                                                @else
                                                                <td> <input class="form-control" type="text" name="reponses[{{ $i }}][description][{{$questionnaire->questions[$i]->options[$j]}}]" value="{{ old('reponses['.$i.'][description]'. $questionnaire->questions[$i]->options[$j] ) }}" id="some_name"> </td>
                                                                @endif
                                                            @endif
                                                        @endfor
                                                    </tr>
                                                    @endforeach
                                                @else	
										 		<tr>
												
												@foreach($questionnaire->questions[$i]->options as $option)
													@if (Str::startsWith($option, 'Nombre'))
										 			<td> <input class="form-control" type="number" name="reponses[{{ $i }}][description][{{$option}}]" value="{{ old('reponses['.$i.']description', '') }}" id="some_name"> </td>													
													@elseif (Str::startsWith($option, 'Date'))
										 			<td><input class="form-control" type="date" name="reponses[{{ $i }}][description][{{$option}}]" value="{{ old('reponses['.$i.'][description]'. $option ) }}" id=""></td>
													@else
										 			<td> <input class="form-control" type="text" name="reponses[{{ $i }}][description][{{$option}}]" value="{{ old('reponses['.$i.'][description]'. $option ) }}" id="some_name"> </td>
													@endif
												@endforeach
										 		</tr>
												@endif
										 	</tbody>
</table>
										 @elseif( ($questionnaire->questions[$i]->type_question)->type == 'radio')
										 <div class="form-check form-check-inline">
										 	<input class="form-check-input" type="radio" name="reponses[{{ $i }}][description]" value="oui" id="">Oui 
										 	<input class="form-check-input" type="radio" name="reponses[{{ $i }}][description]" value="non" id=""> Non
										 </div>
										 @elseif( ($questionnaire->questions[$i]->type_question)->type == 'date')
										 <div id="">
										 	<input class="form-control" type="date" name="reponses[{{ $i }}][description]" value="{{ old('reponses['.$i.'][description]') }}" id="">
										 </div>
										 @elseif( ($questionnaire->questions[$i]->type_question)->type == 'textarea')
										 <div id="">
										 	<textarea class="form-control" name="reponses[{{ $i }}][description]" value="{{ old('reponses['.$i.'][description]') }}" id=""></textarea>
										 </div>
										 @endif
	   								  </div>
										 
										 <br>
                            	@endfor
								<button class="btn btn-primary" type="submit">Soumettre</button>
							</form>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.organisation') }}
                        </th>
                        <td>
                            {{ $questionnaire->organisation->sigle ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
