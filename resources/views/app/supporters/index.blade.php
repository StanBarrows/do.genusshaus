@extends('app.supporters.layouts.default')

@section('app.supporters.content')

    <div class="card">
        <h5 class="card-header">Impersonate a user


        </h5>
        <div class="card-body">

            <div class="alert alert-info" role="alert">
                <strong>Heads up!</strong> You're only allowed to impersonate users without any roles!

            </div>


            <form class="form-horizontal" method="POST" action="{{ route('supporters.impersonate.store') }}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input  title="email"
                                placeholder="User E-Mail"
                                id="email"
                                type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus>

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-primary">
                            Impersonate
                        </button>

                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection

