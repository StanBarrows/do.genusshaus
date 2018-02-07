@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

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


            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection