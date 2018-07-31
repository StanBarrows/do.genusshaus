@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Address

            <div class="float-right"><a href="{{ route('users.support.index') }}" class="btn btn-sm btn-primary">Request changes</a> </div>

        </h5>


        <div class="card-body">

      {{--      <h6>Company</h6>
            <div class="form-group row">

                <div class="col-lg-12">
                    <input title="company"
                           class="form-control"
                           value="{{ $location->company }}" disabled>
                </div>
            </div>
--}}

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

@endsection

