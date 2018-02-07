@role('moderator')

<div class="card">
    <div class="card-header">
        <strong>Moderators</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.dashboard.index') }}">
                <a class="text-center" href="{{ route('moderators.dashboard.index') }}">Dashboard</a>
        </li>
    </ul>
</div>




<div class="card mt-4">
    <div class="card-header">
        <strong>Onboarding</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.invitations.create') }}"><a href="{{ route('moderators.invitations.create') }}">Create a invitiation</a></li>
        <li class="list-group-item {{ current_route('moderators.invitations.index') }}"><a href="{{ route('moderators.invitations.index') }}">Pending invitiations</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Places</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.create') }}"><a href="{{ route('moderators.places.create') }}">Create a place</a></li>
        <li class="list-group-item {{ current_route('moderators.places.index') }}"><a href="{{ route('moderators.places.index') }}">Manage places</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Beacons</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.beacons.create') }}"><a href="{{ route('moderators.beacons.create') }}">Add a beacons</a></li>
        <li class="list-group-item {{ current_route('moderators.beacons.index') }}"><a href="{{ route('moderators.beacons.index') }}">Manage beacons</a></li>
    </ul>
</div>


@endrole