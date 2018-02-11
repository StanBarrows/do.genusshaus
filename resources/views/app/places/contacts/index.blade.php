@extends('app.places.layouts.default')

@section('app.places.content')

    <form class="form-horizontal" method="POST" action="{{ route('places.contacts.update', $place) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="card">
            <h5 class="card-header">Contacts

            </h5>

            <div class="card-body">

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="name"
                               placeholder="Name"
                               id="name"
                               name="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ old('name', optional($place->contact)->name) }}"
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
                        <input title="email"
                               placeholder="E-Mail"
                               id="email"
                               name="email"
                               type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               value="{{ old('email', optional($place->contact)->email) }}"
                               required
                        >

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="web"
                               placeholder="Website"
                               id="web"
                               name="web"
                               type="text"
                               class="form-control{{ $errors->has('web') ? ' is-invalid' : '' }}"
                               value="{{ old('web', optional($place->contact)->web) }}"
                               required
                        >

                        @if ($errors->has('web'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('web') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="phone"
                               placeholder="Phone"
                               id="phone"
                               name="phone"
                               type="text"
                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                               value="{{ old('phone', optional($place->contact)->phone) }}"
                               required
                        >

                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Social Medias

            </h5>

            <div class="card-body">


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="facebook"
                               placeholder="Facebook"
                               id="facebook"
                               name="facebook"
                               type="url"
                               class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                               value="{{ old('facebook', optional($place->contact)->facebook) }}"
                               required
                        >

                        @if ($errors->has('facebook'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="instagram"
                               placeholder="Instagram"
                               id="instagram"
                               name="instagram"
                               type="url"
                               class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                               value="{{ old('instagram', optional($place->contact)->instagram) }}"
                               required
                        >

                        @if ($errors->has('instagram'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('instagram') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="twitter"
                               placeholder="Twitter"
                               id="twitter"
                               name="twitter"
                               type="url"
                               class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                               value="{{ old('twitter', optional($place->contact)->twitter) }}"
                               required
                        >

                        @if ($errors->has('twitter'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>


        <div class="form-group row mt-4">

            <div class="col-lg-12">
                <button class="btn btn-block btn-success" type="submit">Save</button>

            </div>
        </div>


    </form>

@endsection

