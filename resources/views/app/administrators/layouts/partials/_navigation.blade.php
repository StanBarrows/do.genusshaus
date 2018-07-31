@role('administrator')

<div class="card ">
    <div class="card-header">
        <strong>Administrators</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.dashboard.index') }}"><a href="{{ route('administrators.dashboard.index') }}">Dashboard </a></li>
    </ul>
</div>

<div class="card mt-4">
    <div class="card-header">
        <strong>Backend users</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.users.create') }}"><a href="{{ route('administrators.users.create') }}">Create a new user</a></li>
        <li class="list-group-item {{ current_route('administrators.users.index') }}"><a href="{{ route('administrators.users.index') }}">Manage users</a></li>
    </ul>
</div>

{{--<div class="card mt-4">
    <div class="card-header">
        <strong>Recommendations</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.recommendations.index') }}"><a href="{{ route('administrators.recommendations.index') }}">Index</a></li>
    </ul>
</div>



<div class="card mt-4">
    <div class="card-header">
        <strong>Logs</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('administrators.logs.index') }}"><a href="{{ route('administrators.logs.index') }}">Manage logs</a></li>
    </ul>
</div>--}}


@endrole


