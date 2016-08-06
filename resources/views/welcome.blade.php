@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                @if(!Auth::guest())
                <div class="panel-body">
                   Votre Role est : <strong> @foreach(Auth::user()->roles as $role)
                        {{$role->name}}
                    @endforeach</strong>
                    @else
                <p>Votre app landing page</p>
                    @endif
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
