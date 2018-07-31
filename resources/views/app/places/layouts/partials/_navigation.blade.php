<div class="card">
    <div class="card-header">
        <strong>Dashboard</strong>

    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.dashboard.index') }}">
            <a class="text-center" href="{{ route('places.dashboard.index') }}">Dashboard</a>
        </li>

    </ul>
</div>

<div class="card mt-4">
    <div class="card-header">
        <strong>Place</strong>

    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.information.index') }}">
                <a class="text-center" href="{{ route('places.information.index') }}">Information</a>
        </li>
        <li class="list-group-item {{ current_route('places.locations.index') }}">
                <a class="text-center" href="{{ route('places.locations.index') }}">Locations</a>
        </li>

        <li class="list-group-item {{ current_route('places.openings.index') }}">
            <a class="text-center" href="{{ route('places.openings.index') }}">Opening hours</a>
        </li>


        <li class="list-group-item {{ current_route('places.contacts.index') }}">
            <a class="text-center" href="{{ route('places.contacts.index') }}">Contacts</a>
        </li>


        <li class="list-group-item {{ current_route('places.medias.index') }}">
            <a class="text-center" href="{{ route('places.medias.index') }}">Medias</a>
        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Events</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.events.create') }}">
            <a class="text-center" href="{{ route('places.events.create') }}">Create event</a>
        </li>
        <li class="list-group-item {{ current_route('places.events.index') }}">
            <a class="text-center" href="{{ route('places.events.index') }}">Manage event</a>
        </li>
    </ul>
</div>




<div class="card mt-4">
    <div class="card-header">
        <strong>Posts</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.posts.create') }}">
            <a class="text-center" href="{{ route('places.posts.create') }}">Create post</a>
        </li>
        <li class="list-group-item {{ current_route('places.posts.index') }}">
            <a class="text-center" href="{{ route('places.posts.index') }}">Manage posts</a>
        </li>
    </ul>
</div>



<div class="card mt-4">
    <div class="card-header">
        <strong>Settings</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.settings.index') }}">
            <a class="text-center" href="{{ route('places.settings.index') }}">Manage settings</a>
        </li>
    </ul>
</div>




