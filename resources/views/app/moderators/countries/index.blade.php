@extends('app.moderators.layouts.default')

@section('app.moderators.content')

      <div class="card">
        <h5 class="card-header">Countries


        </h5>
        <div class="card-body">

            @if($countries->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($countries as $country)

                        <tr>
                            <th scope="row">{{ $country->id }}</th>
                            <td>{{ $country->code }}</td>
                            <td>{{ $country->name }}</td>

                        </tr>


                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No countries available.
                </div>
            @endif


        </div>
    </div>

@endsection

