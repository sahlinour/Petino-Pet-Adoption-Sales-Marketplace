<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
     <!-- Font Awesome (pour les icônes) -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  {{-- Navbar --}}
    @include('partials.navbar')
  

     <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>
     
      
     {{-- Footer --}}
    @include('partials.footer')
    

    <style>
        .home {
            position: relative; /* Nécessaire pour utiliser ::before */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: url('{{ asset('images/beautiful-pet-portrait-small-dog-cat.jpg') }}') no-repeat;
            background-position: center;
            background-size: cover;
            
        }
    
        .home::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(201, 241, 255, 0); /* Couleur semi-transparente */
            z-index: 1; /* Place la couche avant le fond mais derrière le contenu */
        }
    
        .home > * {
            position: relative; /* Place le contenu au-dessus de la superposition */
            z-index: 2;
        }
        .intro__card:nth-child(1) div {
    background-image: url("{{ asset('images/intro-1-bg.png') }}");
  }
  
  .intro__card:nth-child(2) div {
    background-image: url("{{ asset('images/intro-2-bg.png') }}");
  }
  
  .intro__card:nth-child(3) div {
    background-image: url("{{ asset('images/intro-3-bg.png') }}");
  }
  .banner__card:nth-child(1) {
    background-image: url("{{ asset('images/[GVG] MONCHOUCHOU 2023 신상제품.jpg') }}");
  }
  
  .banner__card:nth-child(2) {
    background-image: url("{{ asset('images/Tailored Dog Food Delivery.jpg') }}");
  }
  
  .banner__card:nth-child(3) {
    background-image: url("{{ asset('images/Premium Photo _ Funny wet white cat after bathing wrapped in a blue towel in a pink terry cap on his head.jpg') }}");
  }
  /* Dropdown menu styles */
  .dropdown {
      position: relative;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      top: 35px;
      right: 0;
      background-color: #fff;
      min-width: 150px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 5px;
      list-style: none;
      padding: 0;
  }

  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
  }

  .dropdown-content a:hover {
      background-color: #ddd;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
      display: block;
  }

  /* Profile icon styles */
  .profile-icon img {
      border-radius: 50%;
      cursor: pointer;
  }
  
    </style>
    
        
</body>
</html>
