@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Posts</h5>

        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('places.posts.store', $place) }}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="title"
                               placeholder="Title"
                               id="title"
                               name="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               value="{{ old('title') }}"
                               required autofocus>

                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <textarea title="teaser" placeholder="Teaser" id="teaser" name="teaser"  class="form-control{{ $errors->has('teaser') ? ' is-invalid' : '' }}" required>
                            {{ old('teaser') }}
                        </textarea>

                        @if ($errors->has('teaser'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('teaser') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <textarea title="body" placeholder="Body" id="body" name="body"  class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required>
                            {{ old('body') }}
                        </textarea>

                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="author"
                               placeholder="Author"
                               id="author"
                               name="author"
                               type="text"
                               class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                               value="{{ old('author') }}"
                               required>

                        @if ($errors->has('author'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('author') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="src"
                               placeholder="Source"
                               id="src"
                               name="src"
                               type="text"
                               class="form-control{{ $errors->has('src') ? ' is-invalid' : '' }}"
                               value="{{ old('src') }}"
                               required>

                        @if ($errors->has('src'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('src') }}</strong>
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
                               class="form-control {{ $errors->has('uploadcare') ? ' is-invalid' : '' }}">

                        @if ($errors->has('uploadcare'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('uploadcare') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Create post</button>

                    </div>
                </div>


            </form>

        </div>
    </div>

@endsection

@section('scripts')

    @include('packages.uploadcare.uploadcare')

@endsection