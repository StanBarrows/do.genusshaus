@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="col-md-6">


        <div class="card">

            <h5 class="card-header">Preview Image </h5>


            @if(optional($place->uploadcares)->count())

                <img class="card-img-top" src="{{ optional($place->uploadcares)->first()->url }}"
                     alt="{{ $place->name }}">
            @endif


            <div class="card-body text-center">


                <form class="form-horizontal" method="POST" action="{{ route('places.medias.update', $place) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group row">

                        <div class="col-lg-12">

                            <input id="uploadcare"
                                   value="{{ old('uploadcare', optional($place->uploadcares->first())->url) }}"
                                   name="uploadcare" type="hidden"
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

                        @if(optional($place->uploadcares)->count())

                            @if($place->image_processed)
                                <div class="col-lg-8 offset-lg-2">
                                    <button class="btn btn-block btn-success" type="submit">Update media</button>
                                </div>
                            @else
                                <div class="col-lg-8 offset-lg-2">
                                    <button class="btn btn-block btn-dark disabled" disabled>Processing...</button>
                                </div>
                            @endif

                        @else
                            <div class="col-lg-8 offset-lg-2">
                                <button class="btn btn-block btn-success" type="submit">Update media</button>
                            </div>
                        @endif

                    </div>


                </form>


            </div>
        </div>

    </div>

@endsection


@section('scripts')

    @include('packages.uploadcare.uploadcare')

@endsection