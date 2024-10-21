<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISKA | Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        .login-box {
            border: solid 1px;
            width: 500px;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="login-box">
            @if (session()->has('status'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <small>Lupa Email atau Password? Hubungi Admin</small>
                <div class="mt-3">
                    <button type="submit" class="form-control btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>