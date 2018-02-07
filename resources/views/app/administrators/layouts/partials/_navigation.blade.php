@role('administrator')

{{--<div class="card ">
    <div class="card-header">
        <strong>Administrators</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="{{ route('administrators.dashboard.index') }}">Dashboard </a></li>
    </ul>
</div>--}}

<div class="card">
    <div class="card-header">
        <strong>Users</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.users.create') }}"><a href="{{ route('administrators.users.create') }}">Create a user</a></li>
        <li class="list-group-item {{ current_route('administrators.users.index') }}"><a href="{{ route('administrators.users.index') }}">Manage users</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Regions</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.regions.index') }}"><a href="{{ route('administrators.regions.index') }}">Manage regions</a></li>
        {{--
                <li class="list-group-item"><a href="">Horizon</a></li>
        --}}

    </ul>
</div>

@endrole