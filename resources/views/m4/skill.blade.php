@extends('m4.layout')
@section('content')
<p>Berikut skill yang saya miliki</p>
<ol>
    @for ($a = 0; $a < count($skill); $a++)
        <li>{{ $skill[$a] }}</li>
    @endfor
</ol>
@endsection