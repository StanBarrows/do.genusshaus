@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">


            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.supporters.partials._sidebar')

            </div>


            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h5 class="card-header">Impersonate a user


                    </h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('supporters.impersonate.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">

                                <div class="col-lg-8 offset-2">
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
                                <div class="col-lg-8 offset-2 text-center">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Impersonate
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