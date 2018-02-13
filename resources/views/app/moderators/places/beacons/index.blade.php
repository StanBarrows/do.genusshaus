@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">
        <h5 class="card-header">Manage beacons

            <span class="float-right">

                <a class=" btn btn-sm btn-success" href="{{ route('moderators.places.beacons.create', $place) }}">Add a beacon</a>

            </span>


        </h5>
        <div class="card-body">

            @if($beacons->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Estimote ID</th>
                        <th class="text-center">Major</th>
                        <th class="text-center">Minor</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($beacons as $beacon)

                        <tr>
                            <th scope="row">{{ $beacon->id }}</th>
                            <td>{{ $beacon->estimote_id ?: 'NA' }}</td>
                            <th class="text-center">{{ $beacon->major }}</th>
                            <th class="text-center"> {{ $beacon->minor }}</th>
                            <th class="text-center">

                                <form class="form-inline text-left" method="POST"
                                      action="{{ route('moderators.places.beacons.delete',[ $place, $beacon]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button  class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>

                            </th>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No beacons available.
                </div>
            @endif



        </div>
    </div>

@endsection

