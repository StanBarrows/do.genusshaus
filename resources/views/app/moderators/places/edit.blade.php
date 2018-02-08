@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Edit - {{ $place->name }}

        </h5>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.update', $place) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <h6>Region</h6>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="region"
                               type="text"
                               class="form-control"
                               value="{{ $place->region->name }}"
                               disabled
                        >

                    </div>
                </div>

                <h6>Name</h6>

                <div class="form-group row">


                    <div class="col-lg-12">
                        <input title="name"
                               placeholder="Name"
                               id="name"
                               name="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ old('name', $place->name) }}"
                               required
                        >

                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Update</button>

                    </div>
                </div>


            </form>


        </div>
    </div>


    <div class="card mt-4">
        <h5 class="card-header">User

            <span class="float-right">

               @if($place->user_id)

                    <form class="" method="POST"
                          action="{{ route('moderators.places.unassign', $place) }}">
                    {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-danger">Unassign {{ optional($place->user)->name }}</button>

                </form>


                @else


                    <form class="form-inline" method="POST"
                          action="{{ route('moderators.places.assign', $place) }}">
                    {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-primary">Assign user </button>

                    </form>


                @endif


            </span>

        </h5>

    </div>



    <div class="card mt-4">
        <h5 class="card-header">Settings

            <span class="float-right">

                 @role('administrator')

                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-place">
               Delete place
                </button>

                @endrole


            </span>
        </h5>
        <div class="card-body">



                    @if($place->active)
                        <form class="form-horizontal" method="POST"
                              action="{{ route('moderators.places.deactivate', $place) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <button class="btn btn-block btn-light">Deactivate place</button>

                        </form>
                    @else
                        <form class="form-horizontal" method="POST"
                              action="{{ route('moderators.places.activate', $place) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <button class="btn btn-block btn-success">Activate place</button>

                        </form>
                    @endif




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

                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="POST" action="{{ route('moderators.places.delete', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-block btn-danger">Delete place</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endrole


@endsection

