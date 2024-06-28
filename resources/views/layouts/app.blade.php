<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body>
<h1>@yield('title')</h1>
@if(session()->has('success'))

    <div> {{session('success')}}</div>

@endif

@yield('content')

</body>
</html>