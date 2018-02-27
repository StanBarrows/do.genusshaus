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
                <strong>Available tags! </strong> Frühstück, Mittagessen, Nachtessen, Trinken, Take-Away, 30 Minuten, 1 Stunde, Gemütlich
            </div>


            <form class="form-horizontal" method="POST" action="{{ route('moderators.places.tags.update', $place) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="form-group row">

                    <div class="col-lg-12">
                        <select title="tags"
                               id="tags"
                               name="tags[]"
                               class="multiple-tags form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                                required multiple="multiple"></select>

                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-lg-12">
                        <button class="btn btn-block btn-success" type="submit">Update tags</button>

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

        $(".multiple-tags").select2({
            placeholder: "Tags",
            tags: true
        });

    </script>
@endsection