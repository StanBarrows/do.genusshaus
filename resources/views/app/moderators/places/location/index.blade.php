@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')





    @if(!empty($place->location))
    <div class="card mb-4">
        <h5 class="card-header">Location

        </h5>
        <div class="card-body">

        {{--    <h6>Company</h6>
            <div class="form-group row">

                <div class="col-lg-12">
                    <input title="company"
                           class="form-control"
                           value="{{ optional($place->location)->company }}" disabled>
                </div>
            </div>
--}}

            <h6>Street</h6>
            <div class="form-group row">

                <div class="col-lg-12">
                    <input title="street"
                           class="form-control"
                           value="{{ optional($place->location)->street }}" disabled>
                </div>
            </div>


            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Postcode</h6>
                    <input title="postcode"
                           class="form-control"
                           value="{{ optional($place->location)->postcode }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Place</h6>
                    <input title="place"
                           class="form-control"
                           value="{{ optional($place->location)->city }}" disabled>
                </div>
            </div>

            <h6>Country</h6>
            <div class="form-group row">
                <div class="col-lg-12">
                    <input title="country"
                           class="form-control"
                           value="{{ optional($place->location)->country->name }}" disabled>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Latitude</h6>
                    <input title="latitude"
                           class="form-control"
                           value="{{ optional($place->location)->latitude }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Longitude</h6>
                    <input title="longitude"
                           class="form-control"
                           value="{{ optional($place->location)->longitude }}" disabled>
                </div>
            </div>

        </div>
    </div>
    @endif


    <div class="card">
        <h5 class="card-header">Update location

        </h5>
        <div class="card-body">


            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.location.update', [$place, $place->location]) }}">
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
                               value="{{ old('location', optional($place->location)->street . ', ' .  optional($place->location)->postcode . ' ' . optional($place->location)->city

                               ) }}"
                               required
                        >

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

