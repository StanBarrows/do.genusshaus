@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            @if(auth()->user()->places->count())
                @foreach(auth()->user()->places as $place)
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/demo_restaurant.jpg') }}" alt="{{ $place->title }}">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $place->name }}</h6>
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