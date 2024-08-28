<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- {{dd(app()->getLocale())}} --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container text-end" style="margin-top: 5px">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                Select Language
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1">
                <li><a class="dropdown-item" href="{{ route('set.language', ['lang' => 'en']) }}">English</a></li>
                <li><a class="dropdown-item" href="{{ route('set.language', ['lang' => 'fr']) }}">French</a></li>
                <li><a class="dropdown-item" href="{{ route('set.language', ['lang' => 'ar']) }}">Arabic</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <!-- Include the form component -->
        @include('form')

        <!-- Include the orders component -->
        @include('orders.index')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
