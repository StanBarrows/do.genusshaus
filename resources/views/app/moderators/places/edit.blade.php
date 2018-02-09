@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">{{ $place->name }}

        </h5>

        <div class="card-body text-center">





        </div>
    </div>


    <div class="row">

    <div class="col-md-4 mt-4 ">
        <div class="card">
            <h5 class="card-header">User


            </h5>

            <div class="card-body text-center">

                @if($place->user_id)

                    <form class="" method="POST"
                          action="{{ route('moderators.places.unassign', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-block btn-danger">Unassign</button>

                    </form>


                @else


                    <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#assign-user">
                        Assign
                    </button>

                @endif

            </div>

        </div>

    </div>



    <div class="col-md-4 mt-4 ">
        <div class="card">
            <h5 class="card-header">Activation


            </h5>

            <div class="card-body text-center">


                @if($place->active)
                    <form class="form-inline" method="POST"
                          action="{{ route('moderators.places.deactivate', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-block btn-danger">Deactivate</button>

                    </form>
                @else
                    <form class="form-inline" method="POST"
                          action="{{ route('moderators.places.activate', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-block btn-success">Activate</button>

                    </form>
                @endif

            </div>

        </div>

    </div>


    @if($place->is_sent_for_review)
    <div class="col-md-4 mt-4 ">
        <div class="card">
            <h5 class="card-header">Review


            </h5>

            <div class="card-body text-center">


                <form class="form-inline" method="POST"
                      action="{{ route('moderators.places.reset', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-sm btn-block btn-warning">Reset review</button>

                </form>

            </div>

        </div>

    </div>
    @endif



        <div class="col-md-4 mt-4 ">
            <div class="card">
                <h5 class="card-header">Publishing


                </h5>

                <div class="card-body text-center">

                    @if($place->published)
                        <form class="form-inline" method="POST"
                              action="{{ route('moderators.places.unpublish', $place) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <button class="btn btn-block btn-sm btn-danger">Unpublish</button>

                        </form>
                    @else
                        <form class="form-inline" method="POST"
                              action="{{ route('moderators.places.publish', $place) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <button class="btn btn-block btn-sm btn-success">Publish</button>

                        </form>
                    @endif

                </div>

            </div>

        </div>




    <div class="col-md-4 mt-4 ">
        <div class="card">
            <h5 class="card-header">Delete


            </h5>

            <div class="card-body text-center">

                <button type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal" data-target="#delete-place">
                    Delete
                </button>

            </div>

        </div>

    </div>


    </div>


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
                          action="{{ route('moderators.places.assign', $place) }}">
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
                                <button class="btn btn-block btn-primary" type="submit">Assign user</button>

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

                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="POST"
                          action="{{ route('moderators.places.delete', $place) }}">
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

