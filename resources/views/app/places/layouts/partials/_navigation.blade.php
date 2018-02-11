<div class="card">
    <div class="card-header">
        <strong>{{ $place->name }}</strong>


        <span class="float-right">

            @if($place->is_sent_for_review)
                <span class="badge badge-warning">Sent for review</span>
            @else
                @if($place->published)
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-danger">Unpublished</span>
                @endif
            @endif

        </span>


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
        <li class="list-group-item {{ current_route('places.information.index') }}">
                <a class="text-center" href="{{ route('places.information.index', $place) }}">Information</a>
        </li>
        <li class="list-group-item {{ current_route('places.addresses.index') }}">
                <a class="text-center" href="{{ route('places.addresses.index', $place) }}">Addresses</a>
        </li>

        <li class="list-group-item {{ current_route('places.openings.index') }}">
            <a class="text-center" href="{{ route('places.openings.index', $place) }}">Opening hours</a>
        </li>


        <li class="list-group-item {{ current_route('places.contacts.index') }}">
            <a class="text-center" href="{{ route('places.contacts.index', $place) }}">Contacts</a>
        </li>


        <li class="list-group-item {{ current_route('places.medias.index') }}">
            <a class="text-center" href="{{ route('places.medias.index', $place) }}">Medias</a>
        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Events</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.events.create') }}">
            <a class="text-center" href="{{ route('places.events.create', $place) }}">Create event</a>
        </li>
        <li class="list-group-item {{ current_route('places.events.index') }}">
            <a class="text-center" href="{{ route('places.events.index', $place) }}">Manage event</a>
        </li>
    </ul>
</div>




<div class="card mt-4">
    <div class="card-header">
        <strong>Posts</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.posts.create') }}">
            <a class="text-center" href="{{ route('places.posts.create', $place) }}">Create post</a>
        </li>
        <li class="list-group-item {{ current_route('places.posts.index') }}">
            <a class="text-center" href="{{ route('places.posts.index', $place) }}">Manage posts</a>
        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Settings</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('places.settings.index') }}">
            <a class="text-center" href="{{ route('places.settings.index', $place) }}">Manage settings</a>
        </li>
    </ul>
</div>



