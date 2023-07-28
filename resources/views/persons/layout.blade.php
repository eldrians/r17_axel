<!DOCTYPE html>
<html>

<head>
    <title>R17 Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="font-lato">

    <div class="bg-slate-100 w-full h-screen flex flex-row justify-center items-center
    py-12">
        <div class="w-4/6 h-full bg-white rounded-xl p-10 shadow-2xl">
            @yield('content')
        </div>

    </div>
    @include('persons.modalCreate')
    @include('persons.modalImport')
</body>

</html>
