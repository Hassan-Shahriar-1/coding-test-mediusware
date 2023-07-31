
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Add CSS -->
    <link rel="stylesheet" href="https://cdn.example.com/css/bootstrap.min.css">
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

    <script src="https://cdn.example.com/js/jquery.min.js"></script>
    <script src="https://cdn.example.com/js/bootstrap.min.js"></script>

</body>
</html>