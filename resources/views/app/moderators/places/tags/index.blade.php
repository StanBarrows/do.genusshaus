@extends('app.moderators.places.layouts.default')

@section('styles')


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('app.moderators.places.content')

    <div class="card">

        <h5 class="card-header">Tags

        </h5>

        <div class="card-body">

            <div class="alert alert-info" role="alert">
                <strong>Available tags! </strong> Frühstück, Mitagessen, Nachtessen, Trinken, Take-Away, 30 Minuten, 1 Stunde, Gemütlich
            </div>


            <form class="form-horizontal" method="" action="#">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group row">

                    <div class="col-lg-12">
                        <input title="tags"
                               placeholder="tags"
                               id="tags"
                               name="tags[]"
                               class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                               value="{{ old('tags') }}"
                               required multiple="multiple">

                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success disabled" type="" disabled>Update tags</button>

                    </div>
                </div>


            </form>



        </div>


    </div>

    <div class="card mt-4">

        <h5 class="card-header">Tags

        </h5>

        <div class="card-body">

            @foreach($tags as $tag)

            <span class="badge badge-primary">{{ $tag->name }}</span>

            @endforeach

        </div>


    </div>



@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <script>

        $(".tags").select2({
            placeholder: "Tags",
            tags: true
        });

    </script>
@endsection