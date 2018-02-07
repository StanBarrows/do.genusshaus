@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                <div class="col-md-12">

                    <div class="card ">

                        <div class="card-header"><strong>Create invitations</strong>


                        </div>

                        <div class="card-body">


                            <form class="form-horizontal" method="POST" action="{{ route('moderators.invitations.store') }}">
                                {{ csrf_field() }}


                                <div class="form-group row">

                                    <div class="col-lg-12">
                                        <input title="email"
                                               placeholder="E-Mail"
                                               id="email"
                                               name="email"
                                               type="text"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               value="{{ old('email') }}"
                                               required autofocus
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

                                        <select title="place_id" id="place_id" class="form-control{{ $errors->has('place_id') ? ' is-invalid' : '' }}" name="place_id" required>

                                            <option disabled selected>Please select</option>
                                            @foreach($places as $place)
                                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('place_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('place_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row">

                                    <div class="col-lg-12">
                                        <button class="btn btn-block btn-success" type="submit">Invite</button>

                                    </div>
                                </div>


                            </form>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection