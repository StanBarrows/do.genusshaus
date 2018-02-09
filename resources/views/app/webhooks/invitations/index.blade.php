@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">

                        <form role="form" method="POST" action="{{ route('invitiations.reset.password', $user) }}">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <div class="col-lg-10 offset-1">
                                    <input title="Name"
                                           class="form-control"
                                           value="{{ $user->name }}"
                                           disabled>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-10 offset-1">
                                    <input title="E-Mail"
                                           class="form-control"
                                           value="{{ $user->email }}"
                                           disabled>

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-lg-10 offset-1">
                                    <input placeholder="Password"
                                           type="password"
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

                                <div class="col-lg-10 offset-1">
                                    <input placeholder="Password Confirmation"
                                           type="password"
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
                                <div class="col-lg-10 offset-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input {{ $errors->has('terms') ? ' is-invalid' : '' }}" name="terms" required> I accept the
                                            <a target="_blank" href="https://www.genusshaus.com/de/geschaeftsbedingungen">terms of service</a>
                                        </label>
                                    </div>

                                    @if ($errors->has('terms'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('terms') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-10 offset-1">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Register
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
