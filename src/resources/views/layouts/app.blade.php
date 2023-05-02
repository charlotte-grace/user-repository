<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/app.css')}}" />
</head>

<body>
    <div class="my-5">
    <div class="p-5 text-center bg-body-tertiary">
        <div class="py-5">
            <img src="{{ asset('storage/banner.jpg') }}" alt="Banner Image">
        </div>
    </div>
</div>
    <div>
        <div class="container">

        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>&copy; Copyright User Listing App.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
