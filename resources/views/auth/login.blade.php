<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAuth.css') }}">
</head>
<body>
    <div class="register-container">
        <h2 class="text-center mb-4">Sign In</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" required placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" required placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <a href="{{ route('register') }}" class="signin">Sign Up</a>
    </form>
       
    </div>
    
<style>
    body {
        background-image: linear-gradient(90deg,#7dafbd,#2791b4,#094e63);
       /*  background: url('{{ asset('images/bones.png') }}') no-repeat;*/
        background-color: #9BC1D6;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

  
</style>

</body>
</html>


