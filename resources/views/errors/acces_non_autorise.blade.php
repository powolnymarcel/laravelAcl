@extends('layouts.master')

@section('content')
     <p>Droits insuffisants </p>
     @include('partials.role')

     <a href="{{route('main')}}">Retour</a>
@endsection