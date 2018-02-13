@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">

        <h5 class="card-header">Activation

        </h5>

        <div class="card-body">



            @if($place->active)
                <form class="form-inline" method="POST"
                      action="{{ route('moderators.places.settings.deactivate', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-sm btn-block btn-danger">Deactivate</button>

                </form>
            @else
                <form class="form-inline" method="POST"
                      action="{{ route('moderators.places.settings.activate', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-sm btn-block btn-success">Activate</button>

                </form>
            @endif

        </div>


    </div>




    <div class="card mt-4">

        <h5 class="card-header">Publishing

        </h5>

        <div class="card-body">

            @if($place->published)
                <form class="form-inline" method="POST"
                      action="{{ route('moderators.places.settings.unpublish', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-block btn-sm btn-danger">Unpublish</button>

                </form>
            @else
                <form class="form-inline" method="POST"
                      action="{{ route('moderators.places.settings.publish', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-block btn-sm btn-success">Publish</button>

                </form>
            @endif


        </div>


    </div>

@endsection

