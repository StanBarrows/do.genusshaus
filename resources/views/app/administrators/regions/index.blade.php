@extends('app.administrators.layouts.default')

@section('app.administrators.content')

      <div class="card">
        <h5 class="card-header">Regions


        </h5>
        <div class="card-body">

            @if($regions->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Places</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($regions as $region)

                        <tr>
                            <th scope="row">{{ $region->id }}</th>
                            <td>{{ $region->name }}</td>
                            <td class="text-center">{{ $region->places->count() }}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No regions available.
                </div>
            @endif


        </div>
    </div>

@endsection

