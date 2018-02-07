@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.partials._sidebar')

            </div>

            <div class="col-sm-12 col-md-9">

                @if(!empty($users))
                    <div class="col-md-12">

                        <div class="card ">

                            <div class="card-header"><strong>Pending invitations</strong>


                            </div>

                            <div class="card-body">


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>E-Mail</th>
                                        <th>Place</th>
                                        <th>Send invitation at</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($users as $user)


                                        <tr>

                                            <td>{{ $user->email }}</td>
                                            @if(!empty($user->place->name))
                                            <td>{{ $user->place->name }}</td>
                                            @else
                                            <td>NA</td>
                                            @endif
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Resend invitation</a></td>

                                        </tr>


                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @endif



            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection