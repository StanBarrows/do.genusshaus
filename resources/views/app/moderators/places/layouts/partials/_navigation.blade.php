@role('moderator')

<div class="card">
    <div class="card-header">
        <strong>{{ $place->name }}</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">


            @if($place->active)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">Inactive</span>
            @endif


            @if($place->published)
                <span class="badge badge-success">Published</span>
            @else
                <span class="badge badge-danger">Unpublished</span>
            @endif

        </li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Place</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.dashboard.index') }}"><a href="{{ route('moderators.places.dashboard.index', $place) }}">Dashboard</a></li>
        <li class="list-group-item {{ current_route('moderators.places.information.index') }}"><a href="{{ route('moderators.places.information.index', $place) }}">Information</a></li>
        <li class="list-group-item {{ current_route('moderators.places.location.index') }}"><a href="{{ route('moderators.places.location.index', $place) }}">Location</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Users</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.users.invite') }}"><a href="{{ route('moderators.places.users.invite', $place) }}">Invite</a></li>
        <li class="list-group-item">

            <a data-toggle="modal" href="#assign-user">Assign</a>

        </li>


        <li class="list-group-item {{ current_route('moderators.places.users.index') }}"><a href="{{ route('moderators.places.users.index', $place) }}">Manage</a></li>
    </ul>
</div>

<div class="card mt-4">
    <div class="card-header">
        <strong>Metas</strong>
    </div>
    <ul class="list-group list-group-flush">
{{--
        <li class="list-group-item {{ current_route('moderators.places.categories.index') }}"><a href="{{ route('moderators.places.categories.index', $place) }}">Categories</a></li>
--}}
        <li class="list-group-item {{ current_route('moderators.places.tags.index') }}"><a href="{{ route('moderators.places.tags.index', $place) }}">Tags</a></li>
    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Beacons</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.beacons.create') }}"><a href="{{ route('moderators.places.beacons.create', $place) }}">Add a beacon</a></li>
        <li class="list-group-item {{ current_route('moderators.places.beacons.index') }}"><a href="{{ route('moderators.places.beacons.index', $place) }}">Manage beacons</a></li>

    </ul>
</div>


<div class="card mt-4">
    <div class="card-header">
        <strong>Settings</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item {{ current_route('moderators.places.settings.index') }}"><a href="{{ route('moderators.places.settings.index', $place) }}">Settings</a></li>
        @role('administrator')
        <li class="list-group-item"><a data-toggle="modal" href="#delete-place">Delete</a></li>
        @endrole
    </ul>
</div>
@endrole



<div class="modal fade" id="assign-user" tabindex="-1" role="dialog" aria-labelledby="assign-user"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assign-user">Assign a user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="form-horizontal" method="POST"
                      action="{{ route('moderators.places.users.assign', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group row mt-3">

                        <div class="col-lg-12">
                            <input title="email"
                                   placeholder="E-Mail"
                                   id="email"
                                   name="email"
                                   type="text"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ old('email') }}"
                                   autofocus required>

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="col-lg-12">
                            <button class="btn btn-block btn-primary" type="submit">Assign a user</button>

                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>

@role('administrator')
<div class="modal fade" id="delete-place" tabindex="-1" role="dialog" aria-labelledby="delete-place"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-place">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Be aware that the effects of this method cannot be reversed immediately.


                <form class="form-horizontal mt-4" method="POST"
                      action="{{ route('moderators.places.settings.delete', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="btn btn-block btn-danger">Delete place</button>
                </form>


            </div>

        </div>
    </div>
</div>
@endrole
