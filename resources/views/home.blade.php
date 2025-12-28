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
  <!-- Navbar -->
  <header class="header">
    <a href="#" class="logo">PATINO</a>
    
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
  
    <nav class="navbar">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Projects</a>
      <a href="#">Contact</a>
      <a href="{{ route('login') }}" class="btn">Sign In</a>
      <a href="{{ route('register') }}" class="btn">Sign Up</a>
    </nav>
  </header>
  

   <!-- Contenu principal -->
 
    <section class="home" id="home" >
        <div class="content">
            <h2><span>Your pet’s happiness</span> <br> starts with the best products</h2>
            <p class="subtitle">We provide premium quality items <br> to keep your furry friends happy, healthy, and thriving.</p>
            <a href="" class="btn">shop now</a>

        </div>
    </section> 

    <section class="categories-section">
      <h2 class="section-title">Browse by Category</h2>
      <div class="categories-grid">
        <div class="category-item">
          <div class="circle-image">
            <img src="{{ asset('images/téléchargement (20).jpg') }}" alt="Dogs">
          </div>
          <div class="category-label-dog">Dogs</div>
        </div>
        <div class="category-item">
          <div class="circle-image">
            <img src="{{ asset('images/cat.jpg') }}" alt="Cats">
          </div>
          <div class="category-label-cat">Cats</div>
        </div>
        <div class="category-item">
          <div class="circle-image">
            <img src="{{ asset('images/téléchargement (21).jpg') }}" alt="Birds">
          </div>
          <div class="category-label-bird">Birds</div>
        </div>
        <div class="category-item">
          <div class="circle-image">
            <img src="{{ asset('images/téléchargement (22).jpg') }}" alt="Rabbits">
          </div>
          <div class="category-label-rabbit">Rabbits</div>
        </div>
      </div>
    </section>
    


    <h1 class="about">ABOUT US</h1>
    <section class="home-section">
      
      <div class="left">
          <img class="left-image-1" src="{{ asset('images/téléchargement (24).jpg') }}" alt="">
          <img class="left-image-2" src="{{ asset('images/DXD studio in Shenzhen, China.jpg') }}" alt="">

      </div>
      <div class="right">
          <div>
              <span class="text-right">A Safe and Easy Platform for Buying and Selling Pets</span>
              <h2>AConnecting Pet Lovers <br> with Their Perfect Companion</h2>
              <p>At Pet Selling System, we are dedicated to providing a seamless and secure marketplace for pet enthusiasts. Whether you're looking to adopt a dog, cat, bird, or rabbit, we offer a variety of pets from trusted sellers. Our platform ensures smooth transactions, verified listings, and a community of pet lovers to help you find your new best friend with confidence.</p>
              <div class="buttons">
                  <button class="btn">
                      <span>shop now</span>
                  </button>
              </div>
          </div>
      </div>
  </section>


   

   <div class="banner__header">
    <h2 class="banner__title">Best Products</h2>
    
    <div class="icons">
      <img src="{{ asset('images/empreinte-de-patte.png') }}" alt="Paw Print" />
      <img src="{{ asset('images/precedent.png') }}" alt="Previous" />
    </div>
  </div>
  
<section class="section__container banner__container" id="special">
    <div class="banner__card">
        <p>EXPERIENCE THE UNIQUE TASTE</p>
        <h4>PREMIUM DOG MILK</h4>
      </div>         
      <div class="banner__card">
        <p>HEALTHY & DELICIOUS</p>
        <h4>FOOD YOUR PETS LOVE<br />CARE YOU CAN TRUST</h4>
      </div>          
      <div class="banner__card">
        <p>PAMPER YOUR PET</p>
        <h4>FRESH & CLEAN<br />EVERY TIME</h4>
      </div>          
  </section>

   
  <section class="how-it-works-grid">
    <div class="how-it-works-container">
      <div class="how-it-works-image">
        <img
          src="{{ asset('images/header.png') }}"
          alt="reservation"
          class="reservation__bg-1"
        />
      </div>
      <div class="how-it-works-cards">
        <div class="step">
          <div class="step-title">
            <i class="fas fa-user-plus step-icon"></i>
            <h3>1. Sign Up</h3>
          </div>
          <p>Create your free account in just a few clicks.</p>
        </div>
        <div class="step">
          <div class="step-title">
            <i class="fas fa-paw step-icon"></i>
            <h3>2. Post Your Pet</h3>
          </div>
          <p>List your pet with all the details and photos.</p>
        </div>
        <div class="step">
          <div class="step-title">
            <i class="fas fa-comments step-icon"></i>
            <h3>3. Connect</h3>
          </div>
          <p>Communicate safely with interested buyers or sellers.</p>
        </div>
        <div class="step">
          <div class="step-title">
            <i class="fas fa-home step-icon"></i>
            <h3>4. New Home</h3>
          </div>
          <p>Give your pet a loving new home or welcome one!</p>
        </div>
      </div>
    </div>
  </section>
  

  
    
  
    <section class="section__container intro__container">
        <p class="section__subheader">Intro</p>
        <h2 class="section__header">Get to know us more</h2>
        <div class="intro__grid">
          <div class="intro__card">
            <div class="intro__image">
              <img src="{{ asset('images/intro-1.png') }}" alt="intro" />
            </div>
            <h4>Pet Experts</h4>
            <p>
              Meet our team of skilled veterinarians, dedicated to your pet's
              well-being.
            </p>
            <a href="#">Read More</a>
          </div>
          <div class="intro__card">
            <div class="intro__image">
              <img src="{{ asset('images/intro-2.png') }}" alt="intro" />
            </div>
            <h4>Vet Services</h4>
            <p>
              Offering a wide range of veterinary services to keep your pets
              healthy and happy.
            </p>
            <a href="#">Read More</a>
          </div>
          <div class="intro__card">
            <div class="intro__image">
              <img src="{{ asset('images/intro-3.png') }}" alt="intro" />
            </div>
            <h4>Contact Us</h4>
            <p>
              Reach out to us for any inquiries or schedule an appointment for
              your pet's care.
            </p>
            <a href="#">Read More</a>
          </div>
        </div>
      </section>

     
      <section class="reservation" id="contact">
        <div class="section__container reservation__container">
          <h3>RESERVATION</h3>
          <h2 class="section__header">BOOK YOUR TABLE</h2>
          <form action="/">
            <input type="text" placeholder="NAME" />
            <input type="email" placeholder="EMAIL" />
            <input type="date" placeholder="DATE" />
            <input type="time" placeholder="TIME" />
            <input type="number" placeholder="PEOPLE" />
            <button class="btn" type="submit">FIND TABLE</button>
          </form>
        </div>
        <img
          src="{{ asset('images/header.png') }}"
          alt="reservation"
          class="reservation__bg-1"
        />
        <img
          src="{{ asset('images/Wagg_Rebrand-removebg-preview.png') }}"
          alt="reservation"
          class="reservation__bg-2"
        />
      </section>
      
     
      
      
      <footer class="footer">
        <div class="footer__container">
          <div class="footer__section">
            <h4>About Us</h4>
            <p>We provide the best products and services for your beloved pets. Dedicated to quality and care.</p>
          </div>
          <div class="footer__section">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#products">Products</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div>
          <div class="footer__section">
            <h4>Contact Us</h4>
            <p>Email: info@petscare.com</p>
            <p>Phone: +123 456 789</p>
            <p>Address: 123 Pet Street, Animal City</p>
          </div>
          <div class="footer__section">
            <h4>Follow Us</h4>
            <div class="footer__socials">
              <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
              <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
              <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a>
              <a href="#"><img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn"></a>
            </div>
          </div>
        </div>
        <div class="footer__bottom">
          <p>&copy; 2025 PetsCare. All Rights Reserved.</p>
        </div>
      </footer>
      
    

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
