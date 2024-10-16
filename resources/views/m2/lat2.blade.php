<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minggu 04: Latihan 02</title>
</head>
<body>
    Halo, nama saya <strong>{{ $nama }}</strong>, nilai saya adalah <strong>{{ $nilai }}</strong>
    @if ($nilai <= 80)
        (<b>A</b>)
    @elseif ($nilai <= 60)
        (<b>B</b>)
    @elseif ($nilai <= 40)
        (<b>C</b>)
    @elseif ($nilai <= 20)
        (<b>D</b>)
    @else
        (<b>E</b>)
    @endif
</body>

</html>