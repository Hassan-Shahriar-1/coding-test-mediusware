
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Add CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Add fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>


    <header>

    </header>


    @include('partials.navbar')

    <!-- Main content section -->
    <main>
        @yield('content')
    </main>

    <!-- Common footer section -->
    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/poper.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>