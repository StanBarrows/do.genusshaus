@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h5 class="card-header">Manage beacons

                    </h5>
                    <div class="card-body">

                        @if(!empty($beacons))
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Place</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($beacons as $beacon)

                                <tr>
                                    <th scope="row">{{ $beacon->id }}</th>
                                    <td>{{ $beacon->name }}</td>
                                    @if(!empty($beacon->place->name))
                                        <td>{{ $beacon->place->name }}</td>
                                    @else
                                        <td>NA</td>
                                    @endif
                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                        @endif


                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection