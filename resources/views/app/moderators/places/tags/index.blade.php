@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">

        <h5 class="card-header">Tags

        </h5>

        <div class="card-body">


            @foreach($tags as $tag)


                <span class="badge badge-primary">{{ $tag->name }}</span>

            @endforeach

        </div>


    </div>

@endsection

