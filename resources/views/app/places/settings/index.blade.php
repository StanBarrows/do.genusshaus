@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Settings

        </h5>

        <div class="card-body">

            @if($place->published)

                <form class="form-horizontal" method="POST" action="{{ route('places.settings.unpublish') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <div class="form-group row">
                        <div class="col-lg-12">
                            <button class="btn btn-block btn-danger" type="submit">Unpublish</button>
                        </div>
                    </div>
                </form>

                @else


                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No settings available.
                </div>


            @endif

        </div>
    </div>

@endsection

