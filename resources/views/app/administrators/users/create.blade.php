@extends('app.administrators.layouts.default')

@section('app.administrators.content')

    <div class="card">
        <h5 class="card-header">Create a user


        </h5>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('administrators.users.store') }}">
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
                               type="email"
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
                        <select title="roles"
                                id="roles"
                                multiple
                                name="roles[]"
                                type="text"
                                class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}"
                                required

                        >

                            <option value="" selected disabled>Please select a role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }} </option>
                            @endforeach

                        </select>

                        @if ($errors->has('roles'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


            {{--    <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="notify" {{ old('notify') ? 'checked' : '' }}> Notfy user
                            </label>
                        </div>
                    </div>
                </div>--}}

                <div class="form-group row">
                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Create a new user</button>
                    </div>
                </div>


            </form>



        </div>
    </div>

@endsection

