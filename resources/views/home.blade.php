@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Tableau de bord
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
                                                <tr>
                                                @foreach($question->options as $key)
                                                    @if(Str::startsWith($key, 'Nombre'))
                                                        <td>{{ $question->reponses->sum('description.'. $key)}}</td>
                                                    @else
                                                        <td>
                                                            {{ $question->reponses->first() }}
                                                        </td>
                                                    @endif
                                                @endforeach
                                                </tr>
                                            </tbody>
                                         </table>
                                         @else
                                            @foreach($question->reponses as $reponse)
                                                <p>{{ $reponse->description }}</p>
                                            @endforeach
                                         @endif 
                                @endforeach
                            </li>
                        @endforeach
                   </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
