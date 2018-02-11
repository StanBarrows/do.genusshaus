@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Events

        </h5>

        <div class="card-body">

            @if($events->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($events as $event)

                        <tr>
                            <td><a href="{{ route('places.events.edit', [$place, $event]) }}">{{ $event->name }}</a></td>
                            <td>{{ $event->start->diffForHumans() }}</td>
                            <td>  @if($event->active)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-danger">Unpublished</span>
                                @endif</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No events available.
                </div>
            @endif

        </div>
    </div>

@endsection

