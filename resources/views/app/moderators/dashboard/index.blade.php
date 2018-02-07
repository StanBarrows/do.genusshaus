@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Manage beacons

        </h5>
        <div class="card-body">

            @if(!empty($beacons))
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Place</th>
                        <th class="text-center">Major</th>
                        <th class="text-center">Minor</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($beacons as $beacon)

                        <tr>
                            <th scope="row">{{ $beacon->id }}</th>
                            <td>{{ optional($beacon->place)->name ?: 'NA' }}</td>
                            <th class="text-center">{{ $beacon->major }}</th>
                            <th class="text-center"> {{ $beacon->minor }}</th>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            @endif


        </div>
    </div>

@endsection

