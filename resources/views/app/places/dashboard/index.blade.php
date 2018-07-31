@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="row">



        <div class="col-md-4 ">

            <div class="card">
                <h5 class="card-header">Status


                </h5>

                <div class="card-body text-center">


                    @if(!empty($place))
                        @if($place->published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif
                    @endif
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

