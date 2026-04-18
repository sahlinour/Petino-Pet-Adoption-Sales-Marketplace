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
    <div class="login-container">
        <h2>Sign In</h2>
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
   
  
</style>

</body>
</html>


