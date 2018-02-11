@role('moderator')
<div class="card">
    <div class="card-header">
        <strong>Place</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.beacons.create') }}"><a href="{{ route('moderators.beacons.create') }}">User</a></li>
        <li class="list-group-item {{ current_route('moderators.beacons.create') }}"><a href="{{ route('moderators.beacons.create') }}">Information</a></li>
        <li class="list-group-item {{ current_route('moderators.beacons.create') }}"><a href="{{ route('moderators.beacons.create') }}">Address</a></li>
    </ul>
</div>

<div class="card mt-4">
    <div class="card-header">
        <strong>Metas</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.invitations.index') }}"><a href="{{ route('moderators.invitations.index') }}">Categories</a></li>
        <li class="list-group-item {{ current_route('moderators.invitations.index') }}"><a href="{{ route('moderators.invitations.index') }}">Tags</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Settings</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.create') }}"><a href="{{ route('moderators.places.create') }}">Settings</a></li>
        @role('administrator')
        <li class="list-group-item {{ current_route('moderators.places.create') }}"><a href="{{ route('moderators.places.create') }}">Delete</a></li>
        @endrole
    </ul>
</div>



@endrole