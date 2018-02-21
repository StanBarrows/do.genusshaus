@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Manage places

        </h5>
        <div class="card-body">

            @if($places->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Stauts</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($places as $place)

                        <tr>
                            <th scope="row">{{ $place->id }}</th>
                            <td>{{ $place->name }}</td>
                            <td class="text-center">

                                @if($place->type === 'basic')
                                    <span class="badge badge-light">Basic</span>
                                @else
                                    <span class="badge badge-dark">Premium</span>
                                @endif

                            </td>
                            <td class="text-center">
                                @if($place->active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-light">Inactive</span>
                                @endif

                                    @if($place->published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-light">Unpublished</span>
                                    @endif


                            </td>
                            <td class="text-center">
                                <a href="{{ route('moderators.places.dashboard.index', $place) }}" class="badge badge-primary">Edit</a>
                            </td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>

            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No places available.
                </div>
            @endif



        </div>
    </div>

@endsection

