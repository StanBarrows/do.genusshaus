@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Manage places

        </h5>
        <div class="card-body">

            @if($places->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">User</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($places as $place)

                        <tr>
                            <th scope="row">{{ $place->id }}</th>
                            <td>{{ $place->name }}</td>
                            <td class="text-center">{{ optional($place->user)->name ?: 'NA'}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>

            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No places available.
                </div>
            @endif



        </div>
    </div>

@endsection

