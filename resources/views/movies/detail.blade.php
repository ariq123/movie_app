@extends('layouts.app')

@section('content')

<div class="row align-items-center">

    <div class="col-md-5" data-aos="fade-right">
        <img src="{{ $movie->Poster }}" class="img-fluid rounded shadow">
        <div class="mt-3 text-center">
            <img src="{{ asset('img/imdb.png') }}" alt="IMDb" style="width: 50px;">
            <span class="ml-2"><b>{{ $movie->imdbRating }}</b> / 10</span>
        </div>
    </div>

    <div class="col-md-7" data-aos="fade-left">

        <h1 class="display-4">{{ $movie->Title }}</h1>

        <hr>

        <p><i class="fas fa-calendar-alt"></i> <b>Year :</b> {{ $movie->Year }}</p>
        <p><i class="fas fa-film"></i> <b>Genre :</b> {{ $movie->Genre }}</p>
        <p><i class="fas fa-user-tie"></i> <b>Director :</b> {{ $movie->Director }}</p>
        <p><i class="fas fa-star"></i> <b>Rating :</b> {{ $movie->imdbRating }} / 10</p>
        <p><i class="fas fa-clock"></i> <b>Duration :</b> {{ $movie->Runtime }}</p>
        <p><i class="fas fa-users"></i> <b>Actors :</b> {{ $movie->Actors }}</p>

        <p class="lead">{{ $movie->Plot }}</p>

        <form method="POST" action="/favorites">
            {{ csrf_field() }}

            <input type="hidden" name="imdb_id" value="{{ $movie->imdbID }}">
            <input type="hidden" name="title" value="{{ $movie->Title }}">
            <input type="hidden" name="poster" value="{{ $movie->Poster }}">

            @if(session('success'))
            <script>
                showToast("{{ session('success') }}", "success");

            </script>
            @endif

            <button class="btn btn-elegant mt-3">
                ⭐ Add Favorite
            </button>
        </form>

        <a href="https://www.youtube.com/results?search_query={{ urlencode($movie->Title . ' trailer') }}" target="_blank" class="btn btn-danger mt-3">
            🎥 Watch Trailer
        </a>

        <a href="https://www.imdb.com/title/{{ $movie->imdbID }}" target="_blank" class="btn btn-warning mt-3">
            🌟 View on IMDb
        </a>

    </div>

</div>

@endsection
