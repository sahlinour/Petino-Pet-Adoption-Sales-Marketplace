<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page d'Accueil</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<style>
/* =====================================================
   PALETTE COLORHUNT
   https://colorhunt.co/palette/213c516594b1ddaed3eeeeee
===================================================== */
:root{
  --dark:#213C51;
  --blue:#6594B1;
  --pink:#DDAED3;
  --light:#EEEEEE;
  --white:#ffffff;

  --blue-soft:#d9e7f0;
  --pink-soft:#f5e5f2;

  --text-dark:#213C51;
  --text-mid:#4f6a7a;
  --text-soft:#7f97a5;

  --shadow-sm:0 4px 12px rgba(33,60,81,.10);
  --shadow-md:0 10px 25px rgba(33,60,81,.15);
  --shadow-lg:0 18px 40px rgba(33,60,81,.18);

  --radius-sm:12px;
  --radius-md:20px;
  --radius-lg:30px;
  --radius-full:999px;

  --transition:.35s ease;

  /* Shadows */
  --shadow-xs: 0 1px 6px rgba(0,153,153,0.08);
  --shadow-sm: 0 4px 16px rgba(0,153,153,0.12);
  --shadow-md: 0 8px 32px rgba(0,153,153,0.16);
  --shadow-lg: 0 20px 56px rgba(0,153,153,0.20);
  --shadow-xl: 0 32px 80px rgba(0,153,153,0.24);

  /* Radii */
  --r-xs:   8px;
  --r-sm:   14px;
  --r-md:   22px;
  --r-lg:   32px;
  --r-xl:   48px;
  --r-2xl:  64px;
  --r-full: 9999px;

  /* Transition */
  --ease: 0.38s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}
/* =====================================================
   GENERAL
===================================================== */
body{
  margin:0;
  padding:0;
  font-family:Arial, Helvetica, sans-serif;
  background:var(--light);
  color:var(--text-dark);
}

.main-content{
  min-height:100vh;
}

/* =====================================================
   HERO SECTION
===================================================== */
.home{
  position:relative;
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:flex-end;
  background:url('{{ asset('images/beautiful-pet-portrait-small-dog-cat.jpg') }}') no-repeat center center/cover;
}

.home::before{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(to right, rgba(33,60,81,.25), rgba(101,148,177,.35));
}

.home>*{
  position:relative;
  z-index:2;
}

/* =====================================================
    CARDS IMAGES
===================================================== */
.intro__card:nth-child(1) div{
  background-image:url("{{ asset('images/intro-1-bg.png') }}");
}
.intro__card:nth-child(2) div{
  background-image:url("{{ asset('images/intro-2-bg.png') }}");
}
.intro__card:nth-child(3) div{
  background-image:url("{{ asset('images/intro-3-bg.png') }}");
}

/* =====================================================
   BANNER CARDS IMAGES
===================================================== */
.banner__card:nth-child(1){
  background-image:url("{{ asset('images/[GVG] MONCHOUCHOU 2023 신상제품.jpg') }}");
}
.banner__card:nth-child(2){
  background-image:url("{{ asset('images/Tailored Dog Food Delivery.jpg') }}");
}
.banner__card:nth-child(3){
  background-image:url("{{ asset('images/Premium Photo _ Funny wet white cat after bathing wrapped in a blue towel in a pink terry cap on his head.jpg') }}");
}

/* =====================================================
   DROPDOWN
===================================================== */
.dropdown{
  position:relative;
}

.dropdown-content{
  display:none;
  position:absolute;
  top:35px;
  right:0;
  background:var(--white);
  min-width:180px;
  border-radius:var(--radius-sm);
  box-shadow:var(--shadow-md);
  overflow:hidden;
  padding:0;
  list-style:none;
  z-index:999;
}

.dropdown-content a{
  display:block;
  padding:12px 16px;
  color:var(--text-dark);
  text-decoration:none;
  transition:var(--transition);
}

.dropdown-content a:hover{
  background:var(--blue-soft);
}

.dropdown:hover .dropdown-content{
  display:block;
}

.profile-icon img{
  border-radius:50%;
  cursor:pointer;
}

/* =====================================================
   CATEGORIES SECTION
===================================================== */
.categories-section{
  background:var(--light);
  position:relative;
  overflow:hidden;
  padding:80px 50px;
}

.categories-section::before{
  content:'';
  position:absolute;
  top:-80px;
  left:-80px;
  width:300px;
  height:300px;
  border-radius:50%;
  background:radial-gradient(circle,var(--blue-soft) 0%,transparent 70%);
}

.cat__grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:0px;
  align-items:center;
  position:relative;
  z-index:2;
}

.cat__tags{
  display:flex;
  flex-wrap:wrap;
  gap:12px;
  margin-bottom:30px;
}

.cat__tag{
  display:flex;
  align-items:center;
  gap:8px;
  padding:10px 18px;
  border-radius:var(--radius-full);
  background:var(--white);
  border:2px solid var(--blue);
  color:var(--text-dark);
  font-size:13px;
  font-weight:700;
  cursor:pointer;
  transition:var(--transition);
}

.cat__tag:hover{
  background:var(--blue);
  color:var(--white);
  transform:translateY(-3px);
  box-shadow:var(--shadow-sm);
}

/* Floating Labels */
.cat__cards-wrap{
  position:relative;
}

.cat__floating-tag{
  position:absolute;
  padding:10px 18px;
  border-radius:var(--radius-full);
  background:var(--blue);
  color:var(--white);
  font-size:12px;
  font-weight:700;
  box-shadow:var(--shadow-md);
  z-index:4;
}

.ft-top{
  top:-15px;
  right:10px;
}

.ft-bot{
  bottom:-15px;
  left:10px;
  background:var(--pink);
  color:var(--text-dark);
}

/* Cards */
.cat__cards{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:18px;
}

.cat-card{
  background:var(--white);
  border-radius:var(--radius-md);
  padding:28px 18px 22px;
  text-align:center;
  position:relative;
  overflow:hidden;
  border:2px solid transparent;
  cursor:pointer;
  transition:var(--transition);
}

.cat-card::before{
  content:'';
  position:absolute;
  inset:0;
  background:linear-gradient(135deg,var(--blue-soft),var(--pink-soft));
  opacity:0;
  transition:var(--transition);
}

.cat-card:hover{
  transform:translateY(-7px);
  border-color:var(--blue);
  box-shadow:var(--shadow-lg);
}

.cat-card:hover::before{
  opacity:1;
}

.cat-card__img{
  position:relative;
  z-index:2;
  width:90px;
  height:90px;
  border-radius:50%;
  overflow:hidden;
  margin:auto;
  margin-bottom:15px;
  border:3px solid var(--blue-soft);
  transition:var(--transition);
}

.cat-card:hover .cat-card__img{
  border-color:var(--blue);
  transform:scale(1.05);
}

.cat-card__img img{
  width:100%;
  height:100%;
  object-fit:cover;
}

.cat-card__name{
  position:relative;
  z-index:2;
  font-size:16px;
  font-weight:800;
  color:var(--text-dark);
}

.cat-card__count{
  position:relative;
  z-index:2;
  font-size:12px;
  color:var(--text-soft);
  margin-top:4px;
}

/* =====================================================
   RESPONSIVE
===================================================== */
@media(max-width:992px){
  .cat__grid{
    grid-template-columns:1fr;
  }
}

@media(max-width:600px){
  .cat__cards{
    grid-template-columns:1fr;
  }

  .cat__floating-tag{
    display:none;
  }
}


/* ══════════════════════════════════════════
   TYPOGRAPHY HELPERS
══════════════════════════════════════════ */
.label-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.13em;
  text-transform: uppercase;
  color: var(--blue);
  background: rgba(255,255,255,0.72);
  border: 1.5px solid var(--pink);
  padding: 5px 14px;
  border-radius: var(--r-full);
  margin-bottom: 16px;
}

.label-tag.on-dark {
  color: var(--teal-200);
  background: rgba(255,255,255,0.10);
  border-color: rgba(255,255,255,0.18);
}

.section-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.9rem, 3.5vw, 3rem);
  font-weight: 700;
  line-height: 1.2;
  color: var(--dark);
}

.section-heading.white { color: var(--white); }

.section-sub {
  font-size: 1rem;
  font-weight: 400;
  color: var(--blue);
  line-height: 1.8;
  margin-top: 14px;

}

.section-sub.white { color: rgba(255,255,255,0.72); }


/* ══════════════════════════════════════════
   BUTTONS
══════════════════════════════════════════ */
.btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700;
  font-size: 14.5px;
  border-radius: var(--r-full);
  border: none;
  cursor: pointer;
  transition: var(--ease);
  white-space: nowrap;
}

.btn-teal {
  background: var(--blue);
  color: var(--white);
  padding: 14px 32px;
  box-shadow: 0 6px 22px var(--pink);
}
.btn-teal:hover {
  background: #2e5e7b;
  transform: translateY(-3px);
  box-shadow: 0 12px 32px #2c6081;
}

.btn-white {
  background: var(--white);
  color: var(--teal-600);
  padding: 14px 32px;
  box-shadow: var(--shadow-sm);
}
.btn-white:hover {
  background: var(--teal-50);
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
}

.btn-outline-white {
  background: transparent;
  color: var(--white);
  padding: 13px 30px;
  border: 2px solid rgba(255,255,255,0.45);
}
.btn-outline-white:hover {
  background: rgba(255,255,255,0.12);
  border-color: rgba(255,255,255,0.75);
  transform: translateY(-2px);
}

.btn-outline-teal {
  background: transparent;
  color: var(--teal-600);
  padding: 13px 28px;
  border: 2px solid var(--teal-200);
  font-size: 13.5px;
}
.btn-outline-teal:hover {
  background: var(--teal-50);
  border-color: var(--teal-400);
  transform: translateY(-2px);
}

/* ══════════════════════════════════
   ABOUT US
══════════════════════════════════ */
.about_section {
  background: var(--blue-soft);
  padding: 60px 20px;
}

.home-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 30px;
}

.home-section .left {
  position: relative;
  height: 500px;
  width: 600px;
}

.home-section .left img {
  position: absolute;
  object-fit: cover;
  border: 8px solid #EEEEEE;
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
  border-radius: 2rem;
  transition: 0.5s;
}

.home-section .left-image-1 {
  width: 450px;
  height: 500px;
}
.home-section .left-image-1:hover {
  transform: scale(1.1) rotate(10deg);
}

.home-section .left-image-2 {
  width: 350px;
  height: 350px;
  top: 150px;
  left: 250px;
}
.home-section .left-image-2:hover {
  transform: scale(1.1) rotate(-10deg);
}

.about__badge {
  position: absolute;
  top: 32%;
  left: 45%;
  transform: translate(-50%, -50%);
  background: #213C51;
  color: #ffffff;
  border-radius: var(--radius-md);
  padding: 14px 22px;
  text-align: center;
  box-shadow: var(--shadow-md);
  z-index: 4;
  min-width: 110px;
}
.about__badge-num {
  font-size: 1.6rem;
  font-weight: 700;
  display: block;
  line-height: 1;
}
.about__badge-lbl {
  font-size: 10.5px;
  font-weight: 600;
  opacity: 0.82;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  margin-top: 4px;
  display: block;
}

.home-section .right {
  margin-right: 105px;
  width: 30%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.about__features {
  list-style: none;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-bottom: 38px;
}
.about__features li {
  display: flex;
  align-items: center;
  gap: 13px;
  font-size: 14.5px;
  font-weight: 600;
  color: #4f6a7a;
}
.about__features li::before {
  content: '';
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #6594B1 url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E") no-repeat center;
  flex-shrink: 0;
}



/* ══════════════════════════════════════════
   ⑤ HAPPY PETS — white bg, 2-col
══════════════════════════════════════════ */
.happy-section {
  background: var(--white);
  overflow: hidden;
  position: relative;
  padding: 80px 7vw;
}

.happy-section::after {
  content: '';
  position: absolute;
  top: -60px; right: -60px;
  width: 340px; height: 340px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--pink-soft) 0%, transparent 70%);
  pointer-events: none;
}

.happy__grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
  position: relative;
  z-index: 1;
}

/* Image side */
.happy__visual { position: relative; }

.happy__img-frame {
  border-radius: var(--r-2xl);
  overflow: hidden;
  box-shadow: var(--blue) 0 20px 40px;
  position: relative;
}

.happy__img-frame::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, transparent 60%, var(--blue-soft) 100%);
  z-index: 1;
}

.happy__img-frame img {
  width: 100%;
  object-fit: cover;
  display: block;
  transition: var(--ease);
}

.happy__img-frame:hover img { transform: scale(1.03); }

.happy__pill {
  position: absolute;
  background: var(--dark);
  border-radius: var(--r-full);
  padding: 11px 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 13px;
  font-weight: 800;
  color: var(--white);
  box-shadow: var(--shadow-md);
  white-space: nowrap;
  z-index: 4;
  border: 2px solid var(--pink);
}

.happy__pill.hp-a { top: 10%; right: -24px; animation: floatBob 5s ease-in-out infinite; }
.happy__pill.hp-b { bottom: 12%; left: -24px; animation: floatBob 7s ease-in-out infinite 2s; }

/* Text side */
.happy__text .section-sub { margin-bottom: 28px; }

.happy__perks {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 38px;
}

.happy__perk {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 14px 18px;
  background: linear-gradient(190deg,var(--white),var(--light));
  border-radius: var(--r-md);
  border: 1.5px solid var(--pink-soft);
  transition: var(--ease);
}

.happy__perk:hover {
  background: var(--pink-soft);
  transform: translateX(4px);
}

.happy__perk-icon {
  width: 42px; height: 42px;
  border-radius: var(--r-sm);
  background: var(--blue);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.happy__perk-text strong {
  display: block;
  font-size: 14px;
  font-weight: 800;
  color: var(--text-dark);
  margin-bottom: 1px;
}

.happy__perk-text span {
  font-size: 12.5px;
  color: var(--text-soft);
  font-weight: 400;
}

/* ══════════════════════════════════════════
   ⑥ PROMO BANNER — 3 cards
══════════════════════════════════════════ */
.promo-section {
  background: #d9e7f0;
  padding: 80px 7vw;
}

.promo__heading {
  text-align: center;
  margin-bottom: 48px;
}

.promo__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 22px;
}

.promo-card {
  border-radius: var(--r-lg);
  padding: 44px 32px;
  position: relative;
  overflow: hidden;
  min-height: 210px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  transition: var(--ease);
  cursor: pointer;
}

.promo-card:hover {
  transform: translateY(-7px);
  box-shadow: var(--dark) 0 30px 32px;
}

.promo-card:nth-child(1) {
  background: linear-gradient(135deg, var(--blue) 30%, var(--blue-soft) 100%);
}
.promo-card:nth-child(2) {
   background: linear-gradient(135deg, var(--dark) 0%, var(--blue) 100%);
}
.promo-card:nth-child(3) {
  background: linear-gradient(135deg, var(--blue) 20%, var(--pink) 100%);
}

/* Decorative circle on each card */
.promo-card::before {
  content: '';
  position: absolute;
  top: -50px; right: -50px;
  width: 180px; height: 180px;
  border-radius: 50%;
  background: rgba(255,255,255,0.08);
}

.promo-card::after {
  content: '';
  position: absolute;
  bottom: -30px; left: -30px;
  width: 120px; height: 120px;
  border-radius: 50%;
  background: rgba(255,255,255,0.05);
}

.promo-card__label {
  font-size: 10.5px;
  font-weight: 800;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.60);
  margin-bottom: 10px;
  position: relative; z-index: 1;
}

.promo-card__title {
  font-family: 'Fraunces', serif;
  font-size: 1.45rem;
  font-weight: 700;
  color: var(--white);
  line-height: 1.28;
  position: relative; z-index: 1;
}

/* ══════════════════════════════════════════
   ⑦ REVIEWS — teal soft bg
══════════════════════════════════════════ */
.reviews-section {
  background: var(--blue-soft);
  padding-bottom: 70px;
  overflow: hidden;
  position: relative;
}

.reviews-section::before {
  content: '';
  position: absolute;
  bottom: -60px; right: -60px;
  width: 280px; height: 280px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--blue) 0%, transparent 70%);
  pointer-events: none;
}

.reviews__header {
  text-align: center;
  margin-bottom: 56px;
  position: relative; z-index: 1;
}

.reviews__header .section-sub {
  margin: 12px auto 0;
  text-align: center;
}

.reviews__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 22px;
  position: relative; z-index: 1;
}

.review-card {
  background: var(--light);
  border-radius: var(--r-lg);
  padding: 34px 28px 28px;
  border: 2px solid transparent;
  transition: var(--ease);
  position: relative;
}

.review-card::before {
  content: '\201C';
  font-family: 'Fraunces', serif;
  font-size: 64px;
  color: var(--pink);
  position: absolute;
  top: 10px; left: 22px;
  line-height: 1;
}

.review-card:hover {
  border-color: var(--pink);
  transform: translateY(-6px);
  box-shadow: var(--shadow-md);
}

.review__head {
  display: flex;
  align-items: center;
  gap: 13px;
  margin-bottom: 18px;
  position: relative;
}

.review__head img {
  width: 48px; height: 48px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid var(--blue);
}

.review__head h4 {
  font-size: 14.5px;
  font-weight: 800;
  color: var(--text-dark);
  margin-bottom: 1px;
}

.review__head span {
  font-size: 12px;
  font-weight: 500;
  color: var(--text-muted);
}

.review__stars {
  font-size: 13px;
  letter-spacing: 2px;
  margin-bottom: 13px;
}

.review__text {
  font-size: 14px;
  color: var(--text-mid);
  line-height: 1.82;
  font-weight: 400;
  font-style: italic;
}


</style>
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

</body>
</html>