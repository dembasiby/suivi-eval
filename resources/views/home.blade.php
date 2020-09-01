@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Tableau de bord
                    <div class="pagination justify-content-center">{{ $indicateurs->links() }}</div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="container">
                   <ul>
                        @foreach($indicateurs as $indicateur)
                            <li style="list-style:none">
                                @if(count($indicateur->reponses) > 0)
                                <h5>{{$indicateur->code_indicateur}} - {{ $indicateur->description }}</h5>
                                @foreach($indicateur->indicateurQuestions as $question)
                                    @if( $question->options != null)
                                        <table class="table w-80">
                                            <thead class="thead-dark">
                                                <tr>
                                                @foreach($question->options as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($question->sub_options != null)
                                                    @foreach($question->sub_options as $sub_option)
                                                        <tr>
                                                            @for($i = 0; $i < count($question->options); $i++)
                                                                @if($i == 0)
                                                                    <td>{{ $sub_option }}</td>
                                                                @else
                                                                    @if(Str::startsWith($question->options[$i], 'Nombre'))
                                                                        <td>{{ $question->reponses->sum('description.'. $question->options[$i] . '.' . $sub_option ) }}</td>
                                                                    @else
                                                                        <td>
                                                                            @foreach($question->reponses as $reponse)
                                                                            {{ $reponse->description[$key][$sub_option] }}
                                                                            @endforeach
                                                                        </td>
                                                                    @endif

                                                                @endif
                                                            @endfor
                                                        </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                @foreach($question->options as $key)
                                                    @if(Str::startsWith($key, 'Nombre'))
                                                        <td>{{ $question->reponses->sum('description.'. $key)}}</td>
                                                    @else
                                                        <td>
                                                            @foreach($question->reponses as $reponse)
                                                                {{ $reponse->description[$key] }}
                                                            @endforeach
                                                        </td>
                                                    @endif
                                                @endforeach
                                                </tr>
                                                @endif
                                            </tbody>
                                         </table>
                                    @elseif(($question->type_question)->type == 'textarea')
                                        <p><strong>{{ $question->description }}</strong></p>
                                        @foreach($question->reponses as $reponse)
                                            {{ $reponse->description }}
                                        @endforeach
                                    @elseif(($question->type_question)->type == 'radio')
                                        <!-- do nothing -->
                                    @else
                                        @foreach($question->reponses as $reponse)
                                            <p>{{ $reponse->description }}</p>
                                        @endforeach
                                    @endif 
                                @endforeach
                            @endif
                            </li>
                        @endforeach
                   </ul> 
                </div>
            </div>
        </div>
    </div>
    <div class="pagination justify-content-center">{{ $indicateurs->links() }}</div>    
</div>
@endsection
