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

                        <th class="text-center">Last activity</th>
                        <th class="text-center"></th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td> <a href="{{ route('administrators.users.edit', $user) }}" class="">{{ $user->name }}</a></td>
                            <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                            <td class="text-center">{{ optional($user->last_activity)->diffForHumans() }}</td>
                            <td class="text-center">
                                <form class="form-inline text-left" method="POST"
                                      action="{{ route('administrators.users.delete',[ $user]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button  class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>

                        @if($user->roles->count())
                        <tr>

                            <th scope="row"></th>
                            <td>@foreach($user->roles as $role)<span style="margin-left: 5px;" class="badge badge-dark">{{ $role->title }}</span>@endforeach</td>
                            <td></td>
                            <td></td>
                            <td></td>


                        </tr>
                        @endif



                    @endforeach

                    </tbody>
                </table>
            @endif


        </div>
    </div>






@endsection

