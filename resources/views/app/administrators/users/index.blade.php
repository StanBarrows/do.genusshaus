@extends('app.administrators.layouts.default')

@section('app.administrators.content')

    <div class="card">
        <h5 class="card-header">Manage Users

        </h5>
        <div class="card-body">

            @if(!empty($users))
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                            <td class="text-center">
                                @if(!auth()->user()->isSameAs($user))
                                    @if($user->active)
                                        <a href="{{ route('administrators.users.activate', $user) }}" onclick="event.preventDefault();document.getElementById('activate-form').submit();"class="badge badge-warning">Deactivate</a>
                                    @else
                                        <a href="#" onclick="event.preventDefault();document.getElementById('deactivate-form').submit();" class="badge badge-success">Activate</a>
                                    @endif
                                @else
                                    @if($user->active)
                                        <span class="badge badge-warning">Deactivate</span>
                                    @else
                                        <span class="badge badge-success">Activate</span>
                                    @endif
                                @endif
                            </td>
                        </tr>

                        @if($user->roles->count())
                        <tr>

                            <th scope="row"></th>
                            <td>Roles: @foreach($user->roles as $role)<span style="margin-left: 5px;" class="badge badge-dark">{{ $role->title }}</span>@endforeach</td>
                            <td></td>
                            <td></td>


                        </tr>
                        @endif

                        <tr class="">

                            <th scope="row"></th>
                            <td>Last activity: <strong>
                                    {{ optional($user->last_activity)->diffForHumans() ?: 'NA' }}
                                </strong></td>
                            <td></td>
                            <td class="text-center">
                                @if(!auth()->user()->isSameAs($user))
                                    <a href="{{ route('administrators.users.edit', $user) }}" class="badge badge-primary">Edit roles</a>

                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="badge badge-danger">Delete</a>
                                @endif
                            </td>


                        </tr>


                        <form id="activate-form" action="{{ route('administrators.users.activate', $user) }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>

                        <form id="deactivate-form" action="{{ route('administrators.users.deactivate', $user) }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>

                        <form id="delete-form" action="{{ route('administrators.users.delete', $user) }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>

                    @endforeach

                    </tbody>
                </table>
            @endif


        </div>
    </div>






@endsection

