@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">

                <div class="col-lg-10 offset-1">
                    <p>Posts</p>

                </div>

                <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group row">

                        <div class="col-lg-10 offset-1">
                            <input title="name"
                                   placeholder="Name"
                                   id="name"
                                   name="name"
                                   type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{ old('name') }}"
                                   autofocus
                            >

                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>


                    <input type="hidden" name="description" value="Lorem Ipsum" required>
                    <input type="hidden" name="start" value="2019-02-05 00:50:12" required>

                    <div class="form-group row">

                        <div class="col-lg-10 offset-1">
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

                        <div class="col-lg-10 offset-1">
                            <button class="btn btn-block btn-success" type="submit">Submit</button>

                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>

@endsection

@section('scripts')

    @include('packages.uploadcare.uploadcare')

@endsection