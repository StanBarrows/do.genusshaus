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
                    <li class="nav-item"><a href="{{ route('dashboard.index') }}" class="nav-link">Dashboard</a></li>

                    <li class="nav-item"><a href="{{ route('places.index') }}" class="nav-link">Places</a></li>
                    <li class="nav-item"><a href="{{ route('events.index') }}" class="nav-link">Events</a></li>

                    {{--  <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                      </li>--}}

                @endif
            </ul>


            <ul class="ml-auto navbar-nav">

                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @else


                    <li class="nav-item"><a href="#" class="nav-link">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>

                @endif
            </ul>


        </div>

    </div>
</nav>


