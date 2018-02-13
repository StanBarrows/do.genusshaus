@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            @if($places->count())
                @foreach($places as $place)
                    <div class="col-md-4 mt-4">
                        <div class="card">

                            @if(optional($place->uploadcares)->count())
                                <img class="card-img-top" src="{{ optional($place->uploadcares)->first()->url }}" alt="{{ $place->title }}">
                                @else
                                <img class="card-img-top" src="{{ asset('storage/images/preview_places.jpg') }}" alt="{{ $place->title }}">
                            @endif


                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $place->name }}</h6>



                                @if($place->is_sent_for_review)
                                    <span class="badge badge-warning">Sent for review</span>
                                @else
                                    @if($place->published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Unpublished</span>
                                    @endif
                                @endif

                                <hr>

                                <a href="{{ route('places.dashboard.index', $place) }}" class="btn btn-sm btn-primary">Manage</a>

                            </div>
                        </div>
                    </div>
                @endforeach

            @else

                <div class="col-md-12">

                    <div class="alert alert-info" role="alert">
                        <strong>Heads up!</strong> You're currently not managing any places.
                    </div>

                </div>

            @endif

        </div>
    </div>

@endsection

@section('scripts')


@endsection