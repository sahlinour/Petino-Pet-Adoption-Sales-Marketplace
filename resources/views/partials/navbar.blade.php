<header class="header">
    <a href="#" class="logo">PATINO</a>
    
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>

    <nav class="navbar">
        <a href="{{ route('home') }}">Home</a>
        <a href="#">About</a>
        <a href="{{ route('petsList') }}">Pets</a>
        <a href="#">Services</a>
        <a href="#">Projects</a>
        <a href="#">Contact</a>
        <a href="{{ route('login') }}" class="btn">Sign In</a>
        <a href="{{ route('register') }}" class="btn">Sign Up</a>
    </nav>
</header>
