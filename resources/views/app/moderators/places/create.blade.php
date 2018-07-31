@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Create a place


        </h5>
        <div class="card-body">


            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.store') }}">
                {{ csrf_field() }}


                <div class="form-group row">

                    <div class="col-lg-12">

                        <select title="region_id" id="region_id"
                                class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}"
                                name="region_id" required autofocus>

                            <option disabled selected>Please select a region</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('region_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('region_id') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="name"
                               placeholder="Name"
                               id="name"
                               name="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ old('name') }}"
                               required
                        >

                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="location"
                               placeholder="Location"
                               id="location"
                               name="location"
                               type="text"
                               class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                               value="{{ old('location') }}"
                               required
                        >

                        @if ($errors->has('location'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('location') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Create a place</button>

                    </div>
                </div>


            </form>


        </div>
    </div>

@endsection

