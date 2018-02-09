@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Posts

        </h5>

        <div class="card-body">

            @if($place->posts->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($place->posts as $post)

                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>  @if($post->active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info! </strong> No posts available.
                </div>
            @endif

        </div>
    </div>

@endsection

