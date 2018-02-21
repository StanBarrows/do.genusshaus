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


                @if($place->reviewed)
                    <form class="form-horizontal" method="POST" action="{{ route('places.settings.review') }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button class="btn btn-block btn-success" type="submit">Send for review</button>
                            </div>
                        </div>
                    </form>

                @else
                    <div class="form-horizontal">

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button class="btn btn-block btn-primary disabled" type="submit">Under review</button>
                            </div>
                        </div>

                    </div>
                @endif




            @endif

        </div>
    </div>

@endsection

