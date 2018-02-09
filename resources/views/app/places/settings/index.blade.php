@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Settings

        </h5>

        <div class="card-body">

            @if($place->published)

                <form class="form-horizontal" method="POST" action="{{ route('places.settings.unpublish', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <div class="form-group row">
                        <div class="col-lg-12">
                            <button class="btn btn-block btn-danger" type="submit">Unpublish</button>
                        </div>
                    </div>
                </form>

            @else


                @if($place->is_sent_for_review)


                    <div class="form-horizontal">

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button class="btn btn-block btn-light disabled" type="submit">Under review</button>
                            </div>
                        </div>


                    </div>



                    @else
                    <form class="form-horizontal" method="POST" action="{{ route('places.settings.review', $place) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button class="btn btn-block btn-warning" type="submit">Send for review</button>
                            </div>
                        </div>
                    </form>

                @endif




            @endif

        </div>
    </div>

@endsection

