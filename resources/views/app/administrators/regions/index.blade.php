@extends('app.administrators.layouts.default')

@section('app.administrators.content')

      <div class="card">
        <h5 class="card-header">Regions


        </h5>
        <div class="card-body">

            @if(!empty($regions))
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Active places</th>
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
            @endif


        </div>
    </div>

@endsection

