@extends('layouts.master')

@section('content')
     <p>Droits insuffisants </p>
     @if(!Auth::guest())
         <div class="panel-body">
             Votre Role est : <strong> @foreach(Auth::user()->roles as $role)
                     {{$role->name}}
                 @endforeach</strong>
             @else
                 <p> Votre Role est : <strong>Visiteur</strong></p>
             @endif
         </div>
     <a href="{{route('main')}}">Retour</a>
@endsection