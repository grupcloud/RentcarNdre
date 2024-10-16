<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minggu 04: Latihan 03</title>
</head>
<body>
    <P>Halo, nama saya <strong>{{ $nama }}</strong>, hobi saya adalah:</P>
    <ul>
        @foreach ($hobi as $val)
            <li>{{ $val }}</li>
        @endforeach
    </ul>
    <p>Berikut skill yang saya miliki</p>
    <ol>
        @for ($a = 0; $a < count($skill); $a++)
            <li>{{ $skill[$a] }}</li>
        @endfor
    </ol>
</body>

</html>