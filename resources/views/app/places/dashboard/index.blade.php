@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Dashboard


            <div class="float-right"><a href="{{ route('users.support.index') }}" class="btn btn-sm btn-primary">Request changes</a> </div>

        </h5>

        <div class="card-body">


                <h6>Typ</h6>
                <div class="form-group row">


                    <div class="col-lg-12">

                        <input title="region"
                               class="form-control"
                               value="{{ $place->type }}" disabled>
                    </div>
                </div>

                <h6>Region</h6>
                <div class="form-group row">

                    <div class="col-lg-12">

                        <input title="region"
                               class="form-control"
                               value="{{ $place->region->name }}" disabled>
                    </div>
                </div>

                <h6>Name</h6>
                <div class="form-group row">


                    <div class="col-lg-12">

                        <input title="name"
                               class="form-control"
                               value="{{ $place->name }}" disabled>


                    </div>
                </div>


                <h6>Description</h6>
                <div class="form-group row">


                    <div class="col-lg-12">

                        <textarea rows="3" title="name"
                               class="form-control"
                                 disabled>{{ $place->description }}</textarea>


                    </div>
                </div>




        </div>
    </div>


    <div class="card mt-4">
        <h5 class="card-header">Address

            <div class="float-right"><a href="{{ route('users.support.index') }}" class="btn btn-sm btn-primary">Request changes</a> </div>


        </h5>

         <div class="card-body">

            <h6>Company</h6>
            <div class="form-group row">

                <div class="col-lg-12">
                    <input title="company"
                           class="form-control"
                           value="{{ optional($place->address)->company }}" disabled>
                </div>
            </div>


              <h6>Street</h6>
                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="street"
                               class="form-control"
                               value="{{ optional($place->address)->street }}" disabled>
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-6">
                        <h6>Postcode</h6>
                        <input title="postcode"
                               class="form-control"
                               value="{{ optional($place->address)->postcode }}" disabled>
                    </div>

                    <div class="col-lg-6">
                        <h6>Place</h6>
                        <input title="place"
                               class="form-control"
                               value="{{ optional($place->address)->city }}" disabled>
                    </div>
                </div>


                <h6>Country</h6>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input title="country"
                               class="form-control"
                               value="{{ optional($place->address)->country->name }}" disabled>
                    </div>
                </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <h6>Latitude</h6>
                    <input title="latitude"
                           class="form-control"
                           value="{{ optional($place->address)->latitude }}" disabled>
                </div>

                <div class="col-lg-6">
                    <h6>Longitude</h6>
                    <input title="longitude"
                           class="form-control"
                           value="{{ optional($place->address)->longitude }}" disabled>
                </div>
            </div>
        </div>
    </div>

@endsection

