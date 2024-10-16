<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        /* Body style */
        body {
            background-color: #f4f4f4;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container style */
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        /* Card header style */
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Card title style */
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Card body style */
        .card-body {
            padding: 20px;
        }

        /* Form input style */
        .form-control {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        /* Submit button style */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover effect for submit button */
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Alert style */
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="bg-info">
    <div class="container">
        <form method="POST" action="{{ route('user.login.action') }}">
            @csrf
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert">
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <input class="form-control" type="username" placeholder="Username" name="username">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">LOGIN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
