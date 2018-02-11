@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">


            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.layouts.partials._navigation')

            </div>

            <div class="col-sm-12 col-md-3 mb-4">

                @include('app.moderators.places.layouts.partials._navigation')

            </div>

            <div class="col-sm-12 col-md-6">

                @yield('app.moderators.places.content')

            </div>
        </div>

    </div>

@endsection

