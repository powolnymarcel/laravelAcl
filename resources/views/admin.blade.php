@extends('layouts.master')

@section('content')
    <table>
        <thead>
        <th>Prenom</th>
        <th>Nom</th>
        <th>E-Mail</th>
        <th>Utilisateur</th>
        <th>Auteur</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        <form action="{{ route('admin.assign') }}" method="post">
        @foreach($users as $user)
            <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email[]" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->aUnRole('Utilisateur') ? 'checked' : '' }} name="role_user[{{ $user->id }}]"></td>
                    <td><input type="checkbox" {{ $user->aUnRole('Auteur') ? 'checked' : '' }} name="role_author[{{ $user->id }}]"></td>
                    <td><input type="checkbox" {{ $user->aUnRole('Admin') ? 'checked' : '' }} name="role_admin[{{ $user->id }}]"></td>
                    {{ csrf_field() }}
                    <td></td>
            </tr>
        @endforeach
            <button type="submit">Assigner les roles</button>
        </form>

        </tbody>
    </table>
@endsection


<!--
@foreach($users as $user)
    <tr>
        <form action="{{ route('admin.assign') }}" method="post">
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
            <td><input type="checkbox" {{ $user->aUnRole('Utilisateur') ? 'checked' : '' }} name="role_user"></td>
            <td><input type="checkbox" {{ $user->aUnRole('Auteur') ? 'checked' : '' }} name="role_author"></td>
            <td><input type="checkbox" {{ $user->aUnRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
            {{ csrf_field() }}
            <td><button type="submit">Assign Roles</button></td>
        </form>
    </tr>
@endforeach
        -->