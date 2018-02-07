@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    @if(!empty($users))
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

                                <td>{{ optional($user->place)->name ?: 'NA' }}</td>

                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Resend invitation</a></td>

                            </tr>


                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
    @endif

@endsection

