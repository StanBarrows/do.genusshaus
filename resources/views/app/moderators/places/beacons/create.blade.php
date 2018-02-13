@extends('app.moderators.places.layouts.default')

@section('app.moderators.places.content')

    <div class="card">
        <h5 class="card-header">Add a beacon


        </h5>
        <div class="card-body">



            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.beacons.store', $place) }}">
                {{ csrf_field() }}


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="estimote_id"
                               placeholder="Estimote ID"
                               id="estimote_id"
                               name="estimote_id"
                               type="text"
                               class="form-control{{ $errors->has('estimote_id') ? ' is-invalid' : '' }}"
                               value="{{ old('estimote_id') }}"
                               required autofocus
                        >

                        @if ($errors->has('estimote_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('estimote_id') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="major"
                               placeholder="Major"
                               id="major"
                               name="major"
                               type="text"
                               class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}"
                               value="{{ old('major') }}"
                               required
                        >

                        @if ($errors->has('major'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('major') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="minor"
                               placeholder="Minor"
                               id="minor"
                               name="minor"
                               type="text"
                               class="form-control{{ $errors->has('minor') ? ' is-invalid' : '' }}"
                               value="{{ old('minor') }}"
                               required
                        >

                        @if ($errors->has('minor'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('minor') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Add a beacon</button>

                    </div>
                </div>


            </form>





        </div>
    </div>

@endsection

