@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    @if(!empty($users))
            <div class="card ">

                <div class="card-header"><strong>Pending invitations</strong>


                </div>


                <div class="card-body">

                    @if(($users->count()))
                    <table class="table">
                        <thead>
                        <tr>
                            <th>E-Mail</th>
                            <th>Send invitation at</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>


                        @foreach($users as $user)

                            <tr>

                                <td>{{ $user->email }}</td>

                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Resend invitation</a></td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong>Info! </strong> No pending invitations available.
                        </div>
                    @endif

                </div>
            </div>
    @endif

@endsection

