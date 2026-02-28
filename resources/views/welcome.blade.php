<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pertemuan 1 - PWF</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            *, *::before, *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background-color: #0a0a0a;
                color: #EDEDEC;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: 2rem;
            }

            .card {
                background-color: #161615;
                border: 1px solid rgba(255, 250, 237, 0.18);
                border-radius: 0.5rem;
                padding: 3rem 4rem;
                max-width: 600px;
                width: 100%;
            }

            .name {
                font-size: 1.25rem;
                font-weight: 600;
                color: #EDEDEC;
                margin-bottom: 0.25rem;
            }

            .nim {
                font-size: 0.95rem;
                color: #A1A09A;
                margin-bottom: 1.25rem;
            }

            .btn {
                display: inline-block;
                padding: 0.4rem 1.25rem;
                background-color: #EDEDEC;
                color: #1C1C1A;
                border: 1px solid #EDEDEC;
                border-radius: 0.25rem;
                font-size: 0.875rem;
                font-weight: 500;
                text-decoration: none;
                cursor: pointer;
                transition: background-color 0.15s, border-color 0.15s;
            }

            .btn:hover {
                background-color: #fff;
                border-color: #fff;
            }
        </style>
    </head>
    <body>
        {{-- Top right navigation --}}
        <div style="position: fixed; top: 1.5rem; right: 1.5rem; display: flex; gap: 0.75rem;">
            <a href="{{ route('login') }}" class="btn">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn">Register</a>
            @endif
        </div>

        {{-- Center card --}}
        <div class="card">
            <h1 class="name">Kamilia Nurmala Hayati</h1>
            <p class="nim">20230140108</p>
            <a href="#" class="btn">Modul Pertemuan 1</a>
        </div>
    </body>
</html>
