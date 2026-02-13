@extends('layouts.app')

@section('content')
<h2 class="mb-4 d-flex justify-content-center">My Wishlist Movie</h2>

<div class="row">

    @foreach($favorites as $fav)

    <div class="col-md-3 mb-4">

        <div class="movie-card">

            <img src="{{ $fav->poster }}" class="w-100">

            <div class="p-3">

                <h5>{{ $fav->title }}</h5>
                @if(session('success'))
                <script>
                    showToast("{{ session('success') }}", "success");

                </script>
                @endif
                <form method="POST" action="/favorites/{{ $fav->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="btn btn-danger btn-sm mt-2">
                        Delete
                    </button>

                </form>


            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection
