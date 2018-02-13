@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="row">

        <div class="col-md-8">

            <div class="card">
                <h5 class="card-header">{{ $event->name }}</h5>

                <div class="card-body">

                    <form class="form-horizontal" method="POST"
                          action="{{ route('places.events.update',[ $place, $event]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group row">

                            <div class="col-lg-12">
                                <h6>Name</h6>
                                <input title="name"
                                       placeholder="Name"
                                       id="name"
                                       name="name"
                                       type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{ old('name', $event->name) }}"
                                       required autofocus>

                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-lg-12">
                                <h6>Description</h6>
                                <textarea rows="3" title="description" placeholder="Description" id="description"
                                          name="description"
                                          class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                          required>{{ old('description',$event->description) }}
                        </textarea>

                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-lg-12">
                                <h6>Start</h6>
                                <input title="start"
                                       placeholder="Start"
                                       id="start"
                                       name="start"
                                       type="date"
                                       class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                       value="{{ old('start', $event->start) }}"
                                       required
                                >

                                @if ($errors->has('start'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-lg-12">
                                <button class="btn btn-block btn-success" type="submit">Update event</button>

                            </div>
                        </div>


                    </form>

                </div>
            </div>

        </div>


        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <strong>Settings</strong>

                    <div class="float-right">

                        @if($event->published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif

                    </div>


                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">


                        @if($event->published)
                            <form class="" method="POST"
                                  action="{{ route('places.events.unpublish',[ $place, $event]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button style="padding: 0px;" class="btn btn-link" type="submit">Unpublish</button>
                            </form>
                        @else


                            <form class="" method="POST"
                                  action="{{ route('places.events.publish',[ $place, $event]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button style="padding: 0px;" class="btn btn-link" type="submit">Publish</button>
                            </form>
                        @endif



                    </li>
                    <li class="list-group-item">

                        <form class="" method="POST"
                              action="{{ route('places.events.delete',[ $place, $event]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button style="padding: 0px;" class="btn btn-link" type="submit">Delete</button>
                        </form>

                    </li>

                </ul>
            </div>


            @if(optional($event->uploadcares)->count())

                <div class="card mt-4">

                    <h5 class="card-header">Event Image </h5>


                    <img class="card-img-top" src="{{ optional($event->uploadcares)->first()->url }}"
                         alt="{{ $event->name }}">


                    {{--<div class="card-body text-center">


                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group row">

                                <div class="col-lg-12">

                                    <input id="uploadcare"
                                           value="{{ old('uploadcare', optional($event->uploadcares->first())->url) }}"
                                           name="uploadcare" type="hidden"
                                           role="uploadcare-uploader"
                                           class="form-control {{ $errors->has('uploadcare') ? ' is-invalid' : '' }}"
                                           required>

                                    @if ($errors->has('uploadcare'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('uploadcare') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">

                                @if($event->image_processed)
                                    <div class="col-lg-8 offset-lg-2">
                                        <button class="btn btn-block btn-success" type="submit">Update media</button>
                                    </div>
                                @else
                                    <div class="col-lg-8 offset-lg-2">
                                        <button class="btn btn-block btn-dark disabled" disabled>Processing...</button>
                                    </div>
                                @endif

                            </div>


                        </form>


                    </div>--}}
                </div>

        </div>
        @endif


    </div>
@endsection

@section('scripts')

    @include('packages.uploadcare.uploadcare')

@endsection