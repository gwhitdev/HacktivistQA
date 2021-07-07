<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
</head>
<body>
    @include('layouts.partials.nav')
    <div class="container">
        @yield('content')
    </div>
    

    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')
</body>
</html>