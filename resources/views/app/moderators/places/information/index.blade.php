@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">

        <h5 class="card-header">Information

        </h5>

        <div class="card-body">


            <h6>Place-Type</h6>
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



        </div>


    </div>

@endsection

