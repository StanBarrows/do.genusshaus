@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Events</h5>

        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('places.events.store', $place) }}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="name"
                               placeholder="Name"
                               id="name"
                               name="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ old('name') }}"
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
                        <textarea title="description" placeholder="Description" id="description" name="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required>
                            {{ old('description') }}
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
                        <input title="start"
                               placeholder="Start"
                               id="start"
                               name="start"
                               type="date"
                               class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                               value="{{ old('start', \Carbon\Carbon::now()) }}"
                               required
                        >

                        @if ($errors->has('start'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('start') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group row">

                    <div class="col-lg-12">
                        <input title="tags"
                               placeholder="Tags"
                               id="tags"
                               name="tags"
                               type="text"
                               class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                               value="{{ old('tags') }}"
                               required
                        >

                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
--}}
                <div class="form-group row">

                    <div class="col-lg-12">
                        <input id="uploadcare" value="{{ old('uploadcare') }}" name="uploadcare" type="hidden"
                               role="uploadcare-uploader"
                               class="form-control {{ $errors->has('uploadcare') ? ' is-invalid' : '' }}" required>

                        @if ($errors->has('uploadcare'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('uploadcare') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Create event</button>

                    </div>
                </div>


            </form>

        </div>
    </div>

@endsection

@section('scripts')

    @include('packages.uploadcare.uploadcare')

@endsection