<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav">

                @if (!Auth::guest())
                    <li class="nav-item"><a href="{{ route('users.dashboard.index') }}" class="nav-link">Your dashboard</a></li>



                    <li class="nav-item"><a href="{{ route('users.support.index') }}" class="nav-link"><strong><i style="color: #4ca0f5" class="fas fa-question-circle fa-lg"></i></strong> Support</a></li>



                @endif
            </ul>


            <ul class="ml-auto navbar-nav">

                @if (Auth::guest())
                    <li class="nav-item"><a href="https://dev.genusshaus.ch" class="nav-link">Zurück zur Landingpage</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @else
                    <li class="avatar">
                        <img src="{{Auth::user()->getAvatar()}}">
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.profile.index') }}">Your profil</a>
                            {{--
                                                       <div class="dropdown-divider"></div>

                                                       <a class="dropdown-item" href="{{ route('users.profile.index') }}">Your subscription</a>
                           --}}

                            @role('administrator')
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('administrators.dashboard.index') }}"><i class="fas fa-unlock mr-1"></i> Administrator </a>
                            @endrole
                            @role('moderator')
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('moderators.dashboard.index') }}"><i class="fas fa-cog mr-1"></i> Moderator </a>
                            @endrole
                            @role('supporter')
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('supporters.index') }}"><i class="fas fa-medkit mr-2"></i>Support </a>
                            @endrole
                        </div>
                    </li>

                    <li class="nav-item"><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>

                    @impersonating
                    <li class="nav-item">

                        <a href="#" onclick="event.preventDefault();document.getElementById('impersonate-destroy').submit();"  class="nav-link">Stop Impersonating</a>


                        <form id="impersonate-destroy" action="{{ route('supporters.impersonate.destroy') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                    @endimpersonating



                @endif

            </ul>


        </div>

    </div>
</nav>


