<header>
    <nav>
        <ul>
            <li><a href="{{ route('main') }}">Accueil</a></li>
            <li><a href="{{ route('author') }}">Auteur</a></li>
            <li><a href="{{ route('admin') }}">Admin</a></li>
            <span id="separator"></span>
            @if(!Auth::check())
                <li><a href="{{ route('signup') }}">Inscription</a></li>
                <li><a href="{{ route('signin') }}">Connexion</a></li>
            @else
                <li><a href="{{ route('logout') }}">Deconnexion</a></li>
            @endif
        </ul>
    </nav>
</header>