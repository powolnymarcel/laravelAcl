@extends('layouts.master')

@section('content')
    <table>
        <thead>
        <th>Prenom</th>
        <th>Nom</th>
        <th>E-Mail</th>
        <th>Utilisateur</th>
        <th>Autheur</th>
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
                    <td><input type="checkbox" {{ $user->aUnRole('Utilisateur') ? 'checked' : '' }} name="role_user[{{ $user->email }}]"></td>
                    <td><input type="checkbox" {{ $user->aUnRole('Auteur') ? 'checked' : '' }} name="role_author[{{ $user->email }}]"></td>
                    <td><input type="checkbox" {{ $user->aUnRole('Admin') ? 'checked' : '' }} name="role_admin[{{ $user->email }}]"></td>
                    {{ csrf_field() }}
                    <td></td>
            </tr>
        @endforeach
            <button type="submit">Assigner les roles</button>
        </form>

        </tbody>
    </table>
@endsection