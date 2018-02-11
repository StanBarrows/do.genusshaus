@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="row">

        <div class="col-md-4">

            <div class="card">
                <h5 class="card-header">Visitors


                </h5>

                <div class="card-body text-center">


                    <strong>{{ random_int(10,250) }}</strong>
                </div>
            </div>


        </div>


        <div class="col-md-4 ">

            <div class="card">
                <h5 class="card-header">Events


                </h5>

                <div class="card-body text-center">


                    <strong>{{ $place->events->count() }}</strong>
                </div>
            </div>


        </div>


        <div class="col-md-4">

            <div class="card">
                <h5 class="card-header">Posts


                </h5>

                <div class="card-body text-center">

                    <strong>{{ $place->posts->count() }}</strong>
                </div>
            </div>


        </div>

    </div>

@endsection

