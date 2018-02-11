@extends('app.places.layouts.default')

@section('app.places.content')

    @if(!empty($location))
    <div class="card">
        <h5 class="card-header">Address

            <div class="float-right"><a href="{{ route('users.support.index', $place) }}" class="btn btn-sm btn-primary">Request changes</a> </div>

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
                           value="{{ $location->street }}" disabled>
                </div>
            </div>


            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Postcode</h6>
                    <input title="postcode"
                           class="form-control"
                           value="{{ $location->postcode }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Place</h6>
                    <input title="place"
                           class="form-control"
                           value="{{ $location->city }}" disabled>
                </div>
            </div>

            <h6>Country</h6>
            <div class="form-group row">
                <div class="col-lg-12">
                    <input title="country"
                           class="form-control"
                           value="{{ $location->country->name }}" disabled>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Latitude</h6>
                    <input title="latitude"
                           class="form-control"
                           value="{{ $location->latitude }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Longitude</h6>
                    <input title="longitude"
                           class="form-control"
                           value="{{ $location->longitude }}" disabled>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

