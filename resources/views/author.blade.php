@extends('layouts.master')

@section('content')
    <h1>Nouvel article</h1>
    <a href="{{ route('author.article') }}">Generer!</a>
@endsection