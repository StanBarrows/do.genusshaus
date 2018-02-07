@extends('app.moderators.layouts.default')

@section('app.moderators.content')

    <div class="card">
        <h5 class="card-header">Create a place


        </h5>
        <div class="card-body">


            <form class="form-horizontal" method="POST" action="{{ route('moderators.beacons.store') }}">
                {{ csrf_field() }}


                <div class="form-group row">

                    <div class="col-lg-12">

                        <select title="region_id" id="region_id"
                                class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}"
                                name="region_id" required autofocus>

                            <option disabled selected>Please select</option>
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
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
                        <input title="address"
                               placeholder="Address"
                               id="address"
                               name="address"
                               type="text"
                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                               value="{{ old('address') }}"
                               required
                        >

                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Create</button>

                    </div>
                </div>


            </form>


        </div>
    </div>

@endsection

