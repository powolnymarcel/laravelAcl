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
                    <td><button type="submit">Assigner un role</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection