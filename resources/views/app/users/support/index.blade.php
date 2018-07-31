@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">

        <div class="col-md-12">

            <div class="card">
                <h5 class="card-header">Support </h5>
                <div class="card-body">

                    @if($places->count())
                        <form class="form-horizontal" method="POST" action="{{ route('users.support.store') }}">
                            {{ csrf_field() }}

                            <h6>Place</h6>
                            <div class="form-group row">

                                <div class="col-lg-12">

                                    <select title="place_id" id="place_id" name="place_id" class="form-control{{ $errors->has('place_id') ? ' is-invalid' : '' }}">

                                        <option disabled selected>Please select a place</option>
                                        @foreach($places as $place)
                                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('place_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('place_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-lg-12">
                                    <textarea title="body" rows="3" id="body" name="body" placeholder="Your request" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{ old('body') }}</textarea>

                                    @if ($errors->has('body'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <button class="btn btn-block btn-success" type="submit">Send a request</button>
                                </div>
                            </div>


                        </form>
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong>Info! </strong> You have no places available to ask any quesitons.
                        </div>
                    @endif




                </div>
            </div>

        </div>




    </div>
</div>

@endsection

@section('scripts')


@endsection