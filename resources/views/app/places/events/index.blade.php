@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Events

        </h5>

        <div class="card-body">

            @if($place->events->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($place->events as $event)

                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->start->diffForHumans() }}</td>
                            <td>  @if($event->active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
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

