@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.users.profile.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h5 class="card-header">Manage profile

                    </h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('users.profile.update', $user) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group row">

                                <div class="col-lg-8 offset-lg-2">
                                    <input
                                            type="text"
                                            placeholder="Ihre Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name"
                                            value="{{ old('name', $user->name) }}"
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

                                <div class="col-lg-8 offset-lg-2">
                                    <input title="E-Mail"
                                           type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email', $user->email) }}"
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
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Save
                                    </button>


                                </div>
                            </div>



                        </form>




                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Update password


                    </h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('users.profile.password.update', $user) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}


                            <div class="form-group row">

                                <div class="col-lg-8 offset-lg-2">
                                    <input
                                            type="password"
                                            placeholder="Passwort"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password"
                                            required
                                    >
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-lg-8 offset-lg-2">
                                    <input
                                            type="password"
                                            placeholder="Passwort bestätigen"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                            required
                                    >
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Update
                                    </button>


                                </div>
                            </div>



                        </form>




                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection