@extends('layouts.app')

@section('content')

@if(isset($movies->Error))
<script>
    showToast("{{ $movies->Error }}", "error");

</script>
@endif

<form class="mb-4 d-flex justify-content-center">
    <input class="form-control w-50 shadow-lg" data-lang-placeholder="search" name="search" placeholder="🔍 Search movie..." style="
                background: rgba(255, 255, 255, 0.1); 
                backdrop-filter: blur(10px); 
                border: 1px solid rgba(255, 255, 255, 0.2); 
                color: white; 
                border-radius: 50px; 
                padding: 12px 25px;
                outline: none;
           ">
</form>


<div class="row" id="movie-container">

    @foreach($movies->Search ?? [] as $movie)

    <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="{{ rand(100,500) }}">

        <div class="movie-card">

            <img data-src="{{ $movie->Poster }}" class="lazyload w-100">

            <div class="p-3">

                <h5>{{ $movie->Title }}</h5>

                <a href="/movies/{{ $movie->imdbID }}" class="btn btn-elegant btn-sm mt-2">
                    View Detail
                </a>

            </div>

        </div>
    </div>


    @endforeach

</div>

@endsection
