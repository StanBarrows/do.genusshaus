@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Dashboard

            <div class="float-right"><a href="{{ route('users.support.index', $place) }}" class="btn btn-sm btn-primary">Request changes</a> </div>

        </h5>

        <div class="card-body">


            <h6>Place-Type</h6>
            <div class="form-group row">


                <div class="col-lg-12">

                    <input title="region"
                           class="form-control"
                           value="{{ $place->type }}" disabled>
                </div>
            </div>

            <h6>Region</h6>
            <div class="form-group row">

                <div class="col-lg-12">

                    <input title="region"
                           class="form-control"
                           value="{{ $place->region->name }}" disabled>
                </div>
            </div>

            <h6>Name</h6>
            <div class="form-group row">


                <div class="col-lg-12">

                    <input title="name"
                           class="form-control"
                           value="{{ $place->name }}" disabled>


                </div>
            </div>


            <h6>Description</h6>

            <form class="form-horizontal" method="POST" action="{{ route('places.information.update', $place) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group row">

                    <div class="col-lg-12">

                         <textarea title="description" placeholder="Description" id="description" name="description" rows="3"
                                   class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                   autofocus required>{{ old('description',$place->description) }}</textarea>

                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </div>
                        @endif

                    </div>



                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Update information</button>

                    </div>
                </div>


            </form>

        </div>
    </div>

@endsection

