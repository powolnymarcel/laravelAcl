@if(!Auth::guest())
    <div class="panel-body">
        @if(!Auth::user()->roles->isEmpty())
            Votre Role est : <strong>
                @foreach(Auth::user()->roles as $role)
                    {{$role->name}}
                @endforeach</strong>
        @endif
        @if(Auth::user()->roles->isEmpty())
            <p> Votre Role est : <strong>Visiteur</strong></p>
        @endif

        @else
            <p> Votre Role est : <strong>Visiteur</strong></p>
        @endif
    </div>