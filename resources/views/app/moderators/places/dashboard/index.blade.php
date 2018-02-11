@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">
        <h5 class="card-header">Dashboard

        </h5>
        <div class="card-body">



            @if($place->is_sent_for_review)

                <div class="alert alert-success" role="alert">
                    <strong>Review! </strong> There is an incoming review.
                </div>

            <div class="row">

                <div class="col-md-6">


                    <form class="form-inline" method="POST"
                          action="{{ route('moderators.places.settings.publish', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-block btn-sm btn-success">Publish</button>

                    </form>

                </div>

                <div class="col-md-6">

                    <form class="form-inline" method="POST"
                          action="{{ route('moderators.places.settings.reset', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-block btn-danger">Reset review</button>

                    </form>


                </div>




            </div>





            @else

                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No notifications available.
                </div>

            @endif


        </div>
    </div>

@endsection

