@extends('layouts.master')

@section('content')
     <p>Droits insuffisants </p>
     @if(!Auth::guest())
         <p>{{Auth::user()->fisrt_name}}</p>

     @endif
     @include('partials.role')

     <a href="{{route('main')}}">Retour</a>
@endsection