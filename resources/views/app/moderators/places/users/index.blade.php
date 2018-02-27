@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">

        <h5 class="card-header">Users

        </h5>

        <div class="card-body">

            @if(!empty($users))
            @if(($users->count()))
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Status</th>
                        <th>Last activity</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($users as $user)

                        <tr>

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->active }}</td>
                            <td>{{ optional($user->last_activity)->diffForHumans() }}</td>

                            <td>

                                <form class="form-inline text-left" method="POST"
                                      action="{{ route('moderators.places.users.remove',[$place, $user]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <button  class="btn btn-sm btn-danger" type="submit">Remove</button>
                                </form>

                            </td>


                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> This places have no assigned users.
                </div>
            @endif
            @endif


        </div>


    </div>

@endsection

