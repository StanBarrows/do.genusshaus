@role('moderator')


<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a  href="{{ route('moderators.places.index') }}">
                <i data-toggle="tooltip" data-placement="top" title="Places"  class="fas fa-location-arrow fa-2x"></i>
            </a></li>
    </ul>
</div>


{{--

<div class="card mt-4">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="{{ route('moderators.regions.index') }}">
                <i class="fas fa-map-pin fa-2x"></i>
            </a></li>

    </ul>
</div>


<div class="card mt-4">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="{{ route('moderators.countries.index') }}"><i class="fas fa-globe fa-2x"></i></a></li>
    </ul>
</div>--}}


@endrole



