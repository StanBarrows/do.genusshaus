@extends('app.places.layouts.default')

@section('app.places.content')

    <div class="card">
        <h5 class="card-header">Add opening hours

        </h5>

        <div class="card-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('places.openings.store') }}">
                {{ csrf_field() }}

                <input name="tabName" id="tabName" type="hidden" value="opening">

                <div class="form-group{{ $errors->has('weekday') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <select id="weekday" class="form-control" name="weekday" required>

                            <option value="" disabled selected>Please select</option>
                            <option  @if( old('weekday')  == 1 ) selected @endif  value="1">Monday</option>
                            <option  @if( old('weekday') == 2 ) selected @endif  value="2">Tuesday</option>
                            <option  @if( old('weekday') == 3 ) selected @endif  value="3">Wednesday</option>
                            <option  @if( old('weekday') == 4 ) selected @endif  value="4">Thursday</option>
                            <option  @if( old('weekday') == 5 ) selected @endif  value="5">Friday</option>
                            <option  @if( old('weekday') == 6 ) selected @endif  value="6">Saturday</option>
                            <option  @if( old('weekday') == 7 ) selected @endif  value="7">Sunday</option>
                        </select>

                        @if ($errors->has('weekday'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('weekday') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('open') ? ' has-error' : '' }}">

                    <div class="col-md-12">

                        <input type="time" class="form-control" id="open" value="{{ old('open') }}" name="open" placeholder="08:00" required>


                        @if ($errors->has('open'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('open') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="form-group{{ $errors->has('close') ? ' has-error' : '' }}">

                    <div class="col-md-12">

                        <input type="time" class="form-control" id="close" value="{{ old('close') }}" name="close" placeholder="12:00" required>

                        @if ($errors->has('close'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('close') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-success">
                            Create
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>


    <div class="card mt-4">
        <h5 class="card-header">Opening hours

        </h5>

        <div class="card-body">


            <table class="table table-striped table-hover">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Von</th>
                    <th>Bis</th>
                    <th></th>
                </tr>

                </thead>

                <tbody>

                @foreach($place->openingHours()->orderBy('weekday','asc')->get() as $opening)

                    <tr>
                        @if($opening->weekday == 1)
                            <td>Monday</td>
                        @elseif($opening->weekday == 2)
                            <td>Tuesday</td>
                        @elseif($opening->weekday == 3)
                            <td>Wednesday</td>
                        @elseif($opening->weekday == 4)
                            <td>Thursday</td>
                        @elseif($opening->weekday == 5)
                            <td>Friday</td>
                        @elseif($opening->weekday == 6)
                            <td>Saturday</td>
                        @elseif($opening->weekday == 7)
                            <td>Sunday</td>
                        @endif

                        <td>{{ $opening->open }}</td>
                        <td>{{ $opening->close }}</td>

                        <td>

                            <form class="" role="form" method="POST" action="{{ route('places.openings.delete', $opening) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger">x</button>

                            </form>


                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection

