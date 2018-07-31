@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="row">

        <div class="col-md-12">


            <div class="card">
                <h5 class="card-header">Push Center</h5>

                <div class="card-body">

                    <strong>Place:</strong> {{ $event->place->name }}<br>
                    <strong>Favourites Count:</strong> {{ $event->place->favourites->count() }}

                    <hr>

                    <h6>Favourites Devices (UUID)</h6>
                    <ul>

                        @foreach($event->place->favourites as $favourite)

                        <li>

                            <strong style="margin-right: 15px;">Uuid:</strong> {{ $favourite->uuid }} <br>
                            <strong style="margin-right: 15px;">Token:</strong>  {{ $favourite->push_token }}

                        </li>

                         @endforeach
                    </ul>

                    <hr>

                    @if($event->place->favourites->count())

                        <a href="{{ route('places.events.send', $event) }}" class="btn btn-success btn-sm">Send push notificaitons</a>

                    @else
                        <a class="btn btn-primary btn-sm disabled">Send push notificaitons</a>
                    @endif

                </div>

            </div>


        </div>

    </div>
@endsection

@section('scripts')


@endsection