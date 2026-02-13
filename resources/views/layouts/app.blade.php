<!DOCTYPE html>
<html>

<head>
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Agar tulisan placeholder juga terlihat transparan/putih tipis */
        input::placeholder {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        /* Efek saat diklik agar tetap transparan */
        input:focus {
            background: rgba(255, 255, 255, 0.15) !important;
            border-color: #E50914 !important;
            /* Warna merah khas cinema */
            color: white !important;
            box-shadow: 0 0 15px rgba(229, 9, 20, 0.4) !important;
        }

        /* Navbar animation */
        .navbar {
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.8) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body class="bg-main">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand font-weight-bold" href="/movies">
            🎬 MovieApp
        </a>

        <div class="ml-auto">
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Language') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="{{ route('change.language', ['lang' => 'en']) }}">English</a>
                    <a class="dropdown-item" href="{{ route('change.language', ['lang' => 'id']) }}">Bahasa Indonesia</a>
                </div>
            </div>
            <a href="/favorites" class="btn btn-warning mr-2">
                ⭐ {{ __('Favorite') }}
            </a>
            <a href="/logout" class="btn btn-danger">
                {{ __('Logout') }}
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
        <script>
            showToast("{{ session('success') }}", "success");

        </script>
        @endif
        @yield('content')
        <script>
            window.scrollTo({
                top: 0
                , behavior: "smooth"
            });

            AOS.init();
            gsap.registerPlugin();

        </script>
    </div>
    <script>
        window.addEventListener("pageshow", function(event) {
            if (event.persisted || window.performance.navigation.type === 2) {
                window.location.reload();
            }
        });

        // Navbar animation on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Initialize AOS
        AOS.init();

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
