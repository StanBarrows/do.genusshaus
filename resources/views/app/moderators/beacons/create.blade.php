@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h5 class="card-header">Create a beacon


                    </h5>
                    <div class="card-body">



                        <form class="form-horizontal" method="POST" action="{{ route('moderators.beacons.store') }}">
                            {{ csrf_field() }}


                            <div class="form-group row">

                                <div class="col-lg-12">
                                    <input title="major"
                                           placeholder="Major"
                                           id="major"
                                           name="major"
                                           type="text"
                                           class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}"
                                           value="{{ old('major') }}"
                                           required autofocus
                                    >

                                    @if ($errors->has('major'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('major') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">

                                <div class="col-lg-12">
                                    <input title="minor"
                                           placeholder="Minor"
                                           id="minor"
                                           name="minor"
                                           type="text"
                                           class="form-control{{ $errors->has('minor') ? ' is-invalid' : '' }}"
                                           value="{{ old('minor') }}"
                                           required
                                    >

                                    @if ($errors->has('minor'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('minor') }}</strong>
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

@endsection

@section('scripts')


@endsection