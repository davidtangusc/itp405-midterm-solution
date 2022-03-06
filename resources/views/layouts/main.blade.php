<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - Q/A</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center my-5">
            <a href="/" class="text-dark">
                Q &amp; A
            </a>
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>

