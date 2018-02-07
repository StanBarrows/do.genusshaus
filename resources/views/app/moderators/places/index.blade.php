@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Manage places

        </h5>
        <div class="card-body">

            @if(!empty($places))
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($places as $place)

                        <tr>
                            <th scope="row">{{ $place->id }}</th>
                            <td>{{ $place->name }}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            @endif


        </div>
    </div>

@endsection

