<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minggu 04: Tugas</title>
</head>
<body>
    <h1>Biodata</h1>
    @yield('content')
    <a href="{{ route('m4.identitas') }}">Identitas</a>
    <a href="{{ route('m4.pendidikan') }}">Pendidikan</a>
    <a href="{{ route('m4.skill') }}">Skill</a>
</body>
</html>