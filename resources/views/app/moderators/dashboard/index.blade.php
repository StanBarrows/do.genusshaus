@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.administrators.dashboard.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h5 class="card-header">Users

                    <span class="float-right badge badge-success">Add user</span>

                    </h5>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection