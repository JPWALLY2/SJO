<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | SJO</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])

    <!-- MEU CSS -->
    @vite(['resources/css/styles.css'])
    <!-- @vite(['resources/sass/app.scss']) -->
</head>

<body>
    <div id="app"></div>
</body>

</html>