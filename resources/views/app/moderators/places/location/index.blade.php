@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')


    <div class="card mb-4">
        <h5 class="card-header">Location

        </h5>
        <div class="card-body">

            <h6>Street</h6>
            <div class="form-group row">

                <div class="col-lg-12">
                    <input title="street"
                           class="form-control"
                           value="{{ $place->location_street }}" disabled>
                </div>
            </div>


            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Postcode</h6>
                    <input title="postcode"
                           class="form-control"
                           value="{{ $place->location_postcode }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Place</h6>
                    <input title="place"
                           class="form-control"
                           value="{{ $place->location_city }}" disabled>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Latitude</h6>
                    <input title="latitude"
                           class="form-control"
                           value="{{ $place->location_latitude }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Longitude</h6>
                    <input title="longitude"
                           class="form-control"
                           value="{{ $place->location_longitude }}" disabled>
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Update location

        </h5>
        <div class="card-body">


            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.location.update', $place) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="location"
                               placeholder="Location"
                               id="location"
                               name="location"
                               type="text"
                               class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                               value="{{ old('location') }}"
                               required>

                        @if ($errors->has('location'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('location') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Update location</button>

                    </div>
                </div>


            </form>


        </div>
    </div>

@endsection

