@extends('layouts.master')

@section('content')
    <h1>Page accessible à tous !</h1>
    @if(!Auth::guest())
        <div class="panel-body">
            Votre Role est : <strong> @foreach(Auth::user()->roles as $role)
                    {{$role->name}}
                @endforeach</strong>
            @else
                <p> Votre Role est : <strong>Visiteur</strong></p>
            @endif
        </div>
@endsection