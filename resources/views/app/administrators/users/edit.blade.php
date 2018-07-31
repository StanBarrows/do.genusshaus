@extends('app.administrators.layouts.default')

@section('app.administrators.content')

    <div class="card">
        <h5 class="card-header">Edit {{ $user->name }}


        </h5>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('administrators.users.update', $user) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="name"
                               type="text"
                               class="form-control"
                               value="{{ $user->name }}"
                               disabled
                        >

                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="email"
                               type="email"
                               class="form-control"
                               value="{{ $user->email }}"
                               disabled
                        >

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
                                <option value="{{ $role->id }}"

                                        {{ (collect($user->roles->pluck('id'))->contains($role->id)) ? 'selected':'' }}

                                >{{ $role->title }} </option>
                            @endforeach

                        </select>

                        @if ($errors->has('roles'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Save</button>
                    </div>
                </div>


            </form>



        </div>
    </div>

@endsection

