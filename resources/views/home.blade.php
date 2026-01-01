@extends('layouts.layoutHome')

@section('content')
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
  
<!-- ================= HAPPY PETS, HAPPY HUMANS ================= -->
<section class="happy-section">
    <div class="happy-container">
        <div class="happy-left">
            <img class="happy-image" src="{{ asset('images/MacBook Pro 16_ - 1.png') }}" alt="Pets Illustration">
      
        </div>
        <div class="happy-right">
            <h2>Happy Pets, Happy Humans 🐾</h2>
            <p>
                A happy pet makes a happy home! Explore our range of products and tips to keep your furry friends healthy,
                playful, and full of life. Because their happiness reflects on you too.
            </p>
            <a href="" class="btn">Discover More</a>
        </div>
    </div>
</section>

  
    
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

  <!-- ================= REVIEWS / TESTIMONIALS ================= -->
<section class="section reviews">
    <h2 class="section__title">What Our Customers Say</h2>
    <p class="section__subtitle">
        Real stories from happy pet lovers 🐾
    </p>

    <div class="reviews__grid">

        <div class="review__card">
            <div class="review__header">
                <img src="{{ asset('images/user1.jpg') }}" alt="User">
                <div>
                    <h4>Sarah M.</h4>
                    <span>Dog Owner</span>
                </div>
            </div>

            <div class="review__stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p class="review__text">
                “I found the perfect puppy in just a few days.
                The platform is safe, easy to use, and reliable.”
            </p>
        </div>

        <div class="review__card">
            <div class="review__header">
                <img src="{{ asset('images/user2.jpg') }}" alt="User">
                <div>
                    <h4>Ahmed L.</h4>
                    <span>Cat Lover</span>
                </div>
            </div>

            <div class="review__stars">
                ⭐⭐⭐⭐☆
            </div>

            <p class="review__text">
                “Great experience! Communication with the seller
                was smooth and secure. Highly recommended.”
            </p>
        </div>

        <div class="review__card">
            <div class="review__header">
                <img src="{{ asset('images/user3.jpg') }}" alt="User">
                <div>
                    <h4>Lina R.</h4>
                    <span>Bird Owner</span>
                </div>
            </div>

            <div class="review__stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p class="review__text">
                “A trustworthy platform with verified listings.
                I felt confident adopting my pet.”
            </p>
        </div>

    </div>
</section>

      
     
    
@endsection
