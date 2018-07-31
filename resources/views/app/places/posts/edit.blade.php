@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="row">

        <div class="col-md-8">

            <div class="card">
                <h5 class="card-header">{{ $post->title }}</h5>

                <div class="card-body">

                    <form class="form-horizontal" method="POST"
                          action="{{ route('places.posts.update',[ $place, $post]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group row">

                            <div class="col-lg-12">
                                <h6>Title</h6>

                                <input title="title"
                                       placeholder="Title"
                                       id="title"
                                       name="title"
                                       type="text"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       value="{{ old('title', $post->title) }}"
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
                                <h6>Teaser</h6>

                                <textarea title="teaser" rows="4" placeholder="Teaser" id="teaser" name="teaser"  class="form-control{{ $errors->has('teaser') ? ' is-invalid' : '' }}" required>{{ old('teaser', $post->teaser) }}
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
                                <h6>Body</h6>

                                <textarea title="body" rows="12" placeholder="Body" id="body" name="body"  class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{ old('body', $post->body) }}
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
                                <h6>Author</h6>

                                <input title="author"
                                       placeholder="Author"
                                       id="author"
                                       name="author"
                                       type="text"
                                       class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                                       value="{{ old('author', $post->author) }}"
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
                                <h6>Source</h6>

                                <input title="src"
                                       placeholder="Source"
                                       id="src"
                                       name="src"
                                       type="text"
                                       class="form-control{{ $errors->has('src') ? ' is-invalid' : '' }}"
                                       value="{{ old('src', $post->src) }}"
                                       required>

                                @if ($errors->has('src'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('src') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-lg-12">
                                <button class="btn btn-block btn-success" type="submit">Update post</button>

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

                        @if($post->published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif

                    </div>


                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">


                        @if($post->published)
                            <form class="" method="POST"
                                  action="{{ route('places.posts.unpublish', $post) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button style="padding: 0px;" class="btn btn-link" type="submit">Unpublish</button>
                            </form>
                        @else


                            <form class="" method="POST"
                                  action="{{ route('places.posts.publish', $post) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button style="padding: 0px;" class="btn btn-link" type="submit">Publish</button>
                            </form>
                        @endif



                    </li>
                    <li class="list-group-item">

                        <form class="" method="POST"
                              action="{{ route('places.posts.delete', $post) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button style="padding: 0px;" class="btn btn-link" type="submit">Delete</button>
                        </form>

                    </li>

                </ul>
            </div>


            @if(optional($post->uploadcares)->count())

                <div class="card mt-4">

                    <h5 class="card-header">Post Image </h5>


                    <img class="card-img-top" src="{{ optional($post->uploadcares)->first()->url }}"
                         alt="{{ $post->title }}">


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