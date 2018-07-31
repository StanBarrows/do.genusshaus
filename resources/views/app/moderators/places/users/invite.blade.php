@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')


    <div class="card">

        <h5 class="card-header">Invite new user

        </h5>

        <div class="card-body">



            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.users.invite.new.store', $place) }}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="name"
                               placeholder="Name"
                               id="name"
                               name="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ old('name') }}"
                               required autofocus
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
                        <input title="email"
                               placeholder="E-Mail"
                               id="email"
                               name="email"
                               type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               value="{{ old('email') }}"
                               required
                        >

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Invite new user</button>

                    </div>
                </div>


            </form>

        </div>


    </div>

    @if(($users->count()))
    <div class="card mt-4">

        <h5 class="card-header">Invite existing user

        </h5>

        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.users.invite.existing.store', $place) }}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <div class="col-lg-12">

                        <select title="user" id="user_id" name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>

                            <option value="" selected disabled>Please select a user</option>
                            @foreach($users as $user)
                                <option>{{ $user->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('user_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Invite existing user</button>

                    </div>
                </div>


            </form>

        </div>


    </div>
    @endif

    <div class="card mt-4">

        <h5 class="card-header">Pending invitations

        </h5>

        <div class="card-body">

            @if(($inactives->count()))
                <table class="table">
                    <thead>
                    <tr>
                        <th>E-Mail</th>
                        <th>Send invitation at</th>

                                                    <th></th>


                    </tr>
                    </thead>
                    <tbody>


                    @foreach($inactives as $user)

                        <tr>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->created_at->diffForHumans() }}</td>

                            <td>

                                <form class="form-inline text-left" method="POST"
                                      action="{{ route('moderators.places.users.resend',[$place, $user]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <button  class="btn btn-sm btn-primary" type="submit">Resend</button>
                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No pending invitations available.
                </div>
            @endif



        </div>


    </div>

@endsection

