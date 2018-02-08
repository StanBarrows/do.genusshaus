<div class="card">
    <div class="card-header">
        <strong>{{ $place->name }}</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Dashboard</a>
        </li>

    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Place</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
                <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage information</a>
        </li>

        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage opening hours</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
                <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage address</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage contacts</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage medias</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage meta data</a>
        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Events</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Create event</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage event</a>
        </li>
    </ul>
</div>




<div class="card mt-4">
    <div class="card-header">
        <strong>Posts</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Create post</a>
        </li>
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage posts</a>
        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Settings</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index', $place) }}">Manage settings</a>
        </li>
    </ul>
</div>



