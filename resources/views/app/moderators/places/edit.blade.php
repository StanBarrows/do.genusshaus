@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">
        <h5 class="card-header">{{ $place->name }}

        </h5>

        <div class="card-body text-center">





        </div>
    </div>


    <div class="row">

    <div class="col-md-4 mt-4 ">
        <div class="card">
            <h5 class="card-header">User


            </h5>

            <div class="card-body text-center">

                @if($place->user_id)

                    <form class="" method="POST"
                          action="{{ route('moderators.places.unassign', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button class="btn btn-sm btn-block btn-danger">Unassign</button>

                    </form>


                @else




                @endif

            </div>

        </div>
@endsection

