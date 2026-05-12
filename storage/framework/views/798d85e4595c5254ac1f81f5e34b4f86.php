

<?php $__env->startSection('title', $pet->name); ?>

<?php $__env->startSection('content'); ?>

<style>
/* ═══════════════════════════════════════════
   TOKENS — synced with home palette
═══════════════════════════════════════════ */
:root {
  --dark:      #213C51;
  --blue:      #6594B1;
  --pink:      #DDAED3;
  --light:     #EEEEEE;
  --white:     #ffffff;
  --blue-soft: #d9e7f0;
  --pink-soft: #f5e5f2;
  --text-dark: #213C51;
  --text-mid:  #4f6a7a;
  --text-soft: #7f97a5;
  --r-sm: 14px; --r-md: 22px; --r-lg: 32px; --r-xl: 48px; --r-full: 9999px;
  --ease: .42s cubic-bezier(.165,.84,.44,1);
  --ease-spring: .5s cubic-bezier(.34,1.56,.64,1);
}

/* ═══════════════════════════════════════════
   STAGGERED REVEAL ANIMATION
═══════════════════════════════════════════ */
.reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity .7s var(--ease), transform .7s var(--ease);
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
.reveal-delay-1 { transition-delay: .1s; }
.reveal-delay-2 { transition-delay: .2s; }
.reveal-delay-3 { transition-delay: .3s; }
.reveal-delay-4 { transition-delay: .4s; }

/* ═══════════════════════════════════════════
   ① EDITORIAL HERO — full bleed, magazine feel
═══════════════════════════════════════════ */
.editorial-hero {
  position: relative;
  min-height: 92vh;
  display: grid;
  grid-template-columns: 55% 45%;
  overflow: hidden;
}

/* Left: oversized image */
.editorial-hero__img {
  position: relative;
  overflow: hidden;
}

.editorial-hero__img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 1.2s var(--ease);
  transform-origin: center;
}
.editorial-hero__img:hover img { transform: scale(1.03); }

/* Overlay gradient fading into right panel */
.editorial-hero__img::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(to right, rgba(33,60,81,.10) 60%, rgba(33,60,81,.55) 100%);
  pointer-events: none;
}

/* Floating label top-left */
.editorial-hero__label {
  position: absolute;
  top: 36px; left: 36px;
  z-index: 4;
  display: flex;
  align-items: center;
  gap: 9px;
  background: rgba(255,255,255,.92);
  backdrop-filter: blur(12px);
  padding: 9px 20px;
  border-radius: var(--r-full);
  font-size: 12px;
  font-weight: 800;
  color: var(--dark);
  letter-spacing: .06em;
  text-transform: uppercase;
  box-shadow: 0 4px 20px rgba(33,60,81,.15);
  animation: floatIn .8s var(--ease-spring) .2s both;
}

.editorial-hero__label .dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: #6fcf97;
  animation: pulse-dot 2s ease-in-out infinite;
}
.editorial-hero__label .dot.sold { background: #eb5757; animation: none; }
.editorial-hero__label .dot.pending { background: #f2c94c; }

@keyframes pulse-dot {
  0%,100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.4); opacity: .7; }
}

/* Scroll hint bottom-left */
.editorial-hero__scroll {
  position: absolute;
  bottom: 32px; left: 36px;
  z-index: 4;
  display: flex;
  align-items: center;
  gap: 10px;
  color: rgba(255,255,255,.60);
  font-size: 11.5px;
  font-weight: 700;
  letter-spacing: .10em;
  text-transform: uppercase;
}
.editorial-hero__scroll-line {
  width: 40px; height: 1px;
  background: rgba(255,255,255,.35);
}

/* Right: info panel */
.editorial-hero__info {
  background: var(--dark);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 80px 56px;
  position: relative;
  overflow: hidden;
}

/* Decorative rings */
.editorial-hero__info::before {
  content: '';
  position: absolute;
  bottom: -120px; right: -120px;
  width: 380px; height: 380px;
  border-radius: 50%;
  border: 60px solid rgba(101,148,177,.08);
  pointer-events: none;
}
.editorial-hero__info::after {
  content: '';
  position: absolute;
  top: -80px; left: -80px;
  width: 260px; height: 260px;
  border-radius: 50%;
  border: 40px solid rgba(221,174,211,.07);
  pointer-events: none;
}

.editorial-hero__info > * { position: relative; z-index: 1; }

/* Breadcrumb */
.editorial-hero__crumb {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  font-weight: 600;
  color: rgba(255,255,255,.35);
  margin-bottom: 32px;
  letter-spacing: .04em;
}
.editorial-hero__crumb a {
  color: rgba(255,255,255,.35);
  text-decoration: none;
  transition: color .25s;
}
.editorial-hero__crumb a:hover { color: var(--pink); }
.editorial-hero__crumb i { font-size: 9px; }

/* Tag pill */
.editorial-tag {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 6px 16px;
  border-radius: var(--r-full);
  background: rgba(221,174,211,.15);
  border: 1.5px solid rgba(221,174,211,.30);
  color: var(--pink);
  font-size: 11px;
  font-weight: 800;
  letter-spacing: .10em;
  text-transform: uppercase;
  margin-bottom: 20px;
  width: fit-content;
}

/* Pet name — editorial large */
.editorial-hero__name {
  font-family: 'Fraunces', serif;
  font-size: clamp(3rem, 5vw, 4.4rem);
  font-weight: 900;
  color: var(--white);
  line-height: .95;
  margin-bottom: 8px;
  letter-spacing: -.03em;
}
.editorial-hero__name em {
  display: block;
  font-style: italic;
  color: var(--pink);
  font-size: .55em;
  letter-spacing: 0;
  margin-bottom: 4px;
  font-weight: 400;
}

.editorial-hero__breed {
  font-size: 13px;
  color: rgba(255,255,255,.40);
  font-weight: 600;
  letter-spacing: .08em;
  text-transform: uppercase;
  margin-bottom: 30px;
}

/* Horizontal rule */
.editorial-rule {
  width: 48px;
  height: 3px;
  border-radius: var(--r-full);
  background: linear-gradient(to right, var(--blue), var(--pink));
  margin-bottom: 26px;
}

.editorial-hero__desc {
  font-size: 14.5px;
  color: rgba(255,255,255,.58);
  line-height: 1.90;
  margin-bottom: 36px;
  font-weight: 400;
}

/* Specs grid */
.editorial-specs {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-bottom: 38px;
}

.spec-item {
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: var(--r-md);
  padding: 16px 18px;
  transition: var(--ease);
}
.spec-item:hover {
  background: rgba(101,148,177,.12);
  border-color: rgba(101,148,177,.30);
  transform: translateY(-2px);
}

.spec-item__icon { font-size: 18px; margin-bottom: 7px; }
.spec-item__label {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: .10em;
  text-transform: uppercase;
  color: rgba(255,255,255,.30);
  margin-bottom: 4px;
}
.spec-item__val {
  font-family: 'Fraunces', serif;
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--white);
}

/* Price display */
.editorial-price {
  display: flex;
  align-items: baseline;
  gap: 6px;
  margin-bottom: 28px;
}
.editorial-price__cur {
  font-size: 14px;
  font-weight: 800;
  color: rgba(255,255,255,.40);
  letter-spacing: .06em;
}
.editorial-price__val {
  font-family: 'Fraunces', serif;
  font-size: 3rem;
  font-weight: 900;
  color: var(--white);
  line-height: 1;
}
.editorial-price__tag {
  font-size: 12px;
  font-weight: 700;
  color: rgba(255,255,255,.35);
  padding-bottom: 4px;
}

/* Buttons */
.editorial-btns {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.btn-editorial-primary {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background: var(--pink);
  color: var(--dark);
  padding: 16px 32px;
  border-radius: var(--r-full);
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: 15px;
  border: none;
  cursor: pointer;
  transition: var(--ease-spring);
  text-decoration: none;
  box-shadow: 0 8px 32px rgba(221,174,211,.35);
}
.btn-editorial-primary:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 16px 44px rgba(221,174,211,.50);
  background: #e8c0df;
}
.btn-editorial-primary:disabled {
  background: rgba(255,255,255,.12);
  color: rgba(255,255,255,.35);
  cursor: not-allowed;
  box-shadow: none;
  transform: none;
}

.btn-editorial-secondary {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background: transparent;
  color: rgba(255,255,255,.60);
  padding: 14px 28px;
  border-radius: var(--r-full);
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700;
  font-size: 14px;
  border: 1.5px solid rgba(255,255,255,.15);
  cursor: pointer;
  transition: var(--ease);
  text-decoration: none;
}
.btn-editorial-secondary:hover {
  border-color: rgba(255,255,255,.40);
  color: var(--white);
  background: rgba(255,255,255,.06);
}

/* ═══════════════════════════════════════════
   ② STATS BAR
═══════════════════════════════════════════ */
.stats-bar {
  background: var(--blue);
  padding: 28px 7vw;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
}

.stats-bar__item {
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 1;
  min-width: 160px;
}

.stats-bar__item + .stats-bar__item {
  padding-left: 28px;
  border-left: 1px solid rgba(255,255,255,.20);
}

.stats-bar__icon {
  font-size: 26px;
  flex-shrink: 0;
}

.stats-bar__val {
  font-family: 'Fraunces', serif;
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--white);
  line-height: 1;
  display: block;
}
.stats-bar__lbl {
  font-size: 11.5px;
  font-weight: 600;
  color: rgba(255,255,255,.60);
  letter-spacing: .05em;
}

/* ═══════════════════════════════════════════
   ③ ABOUT — asymmetric layout
═══════════════════════════════════════════ */
.about-section {
  background: var(--white);
  padding: 100px 7vw;
  position: relative;
  overflow: hidden;
}

.about-section::before {
  content: '🐾';
  position: absolute;
  font-size: 18rem;
  right: -2rem;
  top: 50%;
  transform: translateY(-50%);
  opacity: .04;
  line-height: 1;
  pointer-events: none;
  user-select: none;
}

.about-section__inner {
  max-width: 1160px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1.3fr;
  gap: 80px;
  align-items: start;
}

/* Left: sticky text */
.about-section__sticky {
  position: sticky;
  top: 100px;
}

.about-section__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: .13em;
  text-transform: uppercase;
  color: var(--blue);
  background: var(--blue-soft);
  border: 1.5px solid rgba(101,148,177,.25);
  padding: 5px 14px;
  border-radius: var(--r-full);
  margin-bottom: 22px;
}

.about-section__heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 3.5vw, 3rem);
  font-weight: 700;
  color: var(--dark);
  line-height: 1.15;
  margin-bottom: 22px;
}

.about-section__body {
  font-size: 15px;
  color: var(--text-mid);
  line-height: 1.90;
  margin-bottom: 36px;
}

/* Right: feature cards stack */
.about-features {
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.feature-card {
  background: var(--light);
  border-radius: var(--r-lg);
  padding: 28px 26px;
  display: flex;
  align-items: flex-start;
  gap: 20px;
  border: 1.5px solid transparent;
  transition: var(--ease);
  cursor: default;
}
.feature-card:hover {
  background: var(--white);
  border-color: var(--blue);
  box-shadow: 0 12px 40px rgba(33,60,81,.10);
  transform: translateX(6px);
}

.feature-card__icon-wrap {
  width: 52px; height: 52px;
  border-radius: var(--r-md);
  display: flex; align-items: center; justify-content: center;
  font-size: 24px;
  flex-shrink: 0;
  transition: var(--ease-spring);
}
.feature-card:hover .feature-card__icon-wrap { transform: scale(1.12) rotate(-4deg); }

.feature-card:nth-child(1) .feature-card__icon-wrap { background: var(--blue-soft); }
.feature-card:nth-child(2) .feature-card__icon-wrap { background: var(--pink-soft); }
.feature-card:nth-child(3) .feature-card__icon-wrap { background: #edfaf3; }
.feature-card:nth-child(4) .feature-card__icon-wrap { background: #fff8e6; }

.feature-card__title {
  font-size: 15px;
  font-weight: 800;
  color: var(--dark);
  margin-bottom: 6px;
}

.feature-card__text {
  font-size: 13.5px;
  color: var(--text-mid);
  line-height: 1.75;
  font-weight: 400;
}

/* ═══════════════════════════════════════════
   ④ PHOTO MOOD — full bleed tinted section
═══════════════════════════════════════════ */
.mood-section {
  position: relative;
  height: 480px;
  overflow: hidden;
}

.mood-section__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 30%;
  display: block;
  filter: brightness(.55) saturate(.8);
  transition: transform 1s var(--ease);
}
.mood-section:hover .mood-section__img { transform: scale(1.03); }

.mood-section__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to right, rgba(33,60,81,.85) 35%, transparent 100%);
  display: flex;
  align-items: center;
  padding: 0 10vw;
}

.mood-section__quote {
  max-width: 520px;
}

.mood-section__quote blockquote {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  font-style: italic;
  color: var(--white);
  line-height: 1.35;
  margin: 0 0 20px;
}

.mood-section__quote blockquote::before {
  content: '"';
  color: var(--pink);
  font-size: 4rem;
  line-height: 0;
  vertical-align: -.6em;
  margin-right: 6px;
}

.mood-section__quote cite {
  font-style: normal;
  font-size: 13px;
  font-weight: 700;
  color: rgba(255,255,255,.50);
  letter-spacing: .08em;
  text-transform: uppercase;
}

/* ═══════════════════════════════════════════
   ⑤ TRUST CHECKLIST
═══════════════════════════════════════════ */
.trust-section {
  background: var(--blue-soft);
  padding: 90px 7vw;
  position: relative;
  overflow: hidden;
}

.trust-section::after {
  content: '';
  position: absolute;
  bottom: -80px; right: -80px;
  width: 320px; height: 320px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(221,174,211,.40) 0%, transparent 70%);
}

.trust-section__inner {
  max-width: 1100px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.trust-section__header {
  text-align: center;
  margin-bottom: 56px;
}

.trust-section__label {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: .13em;
  text-transform: uppercase;
  color: var(--blue);
  background: rgba(255,255,255,.72);
  border: 1.5px solid rgba(101,148,177,.25);
  padding: 5px 14px;
  border-radius: var(--r-full);
  margin-bottom: 16px;
}

.trust-section__heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 700;
  color: var(--dark);
}

.trust-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 22px;
}

.trust-card {
  background: var(--white);
  border-radius: var(--r-lg);
  padding: 36px 28px;
  text-align: center;
  border: 1.5px solid rgba(101,148,177,.12);
  transition: var(--ease);
  position: relative;
  overflow: hidden;
}

.trust-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(to right, var(--blue), var(--pink));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .4s var(--ease);
}
.trust-card:hover::before { transform: scaleX(1); }
.trust-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 56px rgba(33,60,81,.12);
}

.trust-card__emoji {
  font-size: 3rem;
  margin-bottom: 18px;
  display: block;
  transition: var(--ease-spring);
}
.trust-card:hover .trust-card__emoji { transform: scale(1.15) rotate(-5deg); }

.trust-card__title {
  font-family: 'Fraunces', serif;
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 10px;
}

.trust-card__text {
  font-size: 13.5px;
  color: var(--text-mid);
  line-height: 1.78;
  font-weight: 400;
}

/* ═══════════════════════════════════════════
   ⑥ FINAL CTA — diagonal cut design
═══════════════════════════════════════════ */
.final-cta {
  background: var(--dark);
  position: relative;
  overflow: hidden;
  padding: 110px 7vw 100px;
  clip-path: polygon(0 6%, 100% 0, 100% 94%, 0 100%);
  margin-top: -40px;
  margin-bottom: -40px;
}

.final-cta::before {
  content: '';
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 800px; height: 800px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(101,148,177,.12) 0%, transparent 65%);
  pointer-events: none;
}

.final-cta__inner {
  position: relative;
  z-index: 1;
  max-width: 700px;
  margin: 0 auto;
  text-align: center;
}

.final-cta__paw {
  font-size: 3.4rem;
  margin-bottom: 22px;
  display: block;
  filter: drop-shadow(0 0 20px rgba(221,174,211,.50));
  animation: floatPaw 3s ease-in-out infinite;
}
@keyframes floatPaw {
  0%,100% { transform: translateY(0) rotate(0deg); }
  50%      { transform: translateY(-12px) rotate(5deg); }
}

.final-cta__heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 4vw, 3.2rem);
  font-weight: 900;
  color: var(--white);
  line-height: 1.1;
  margin-bottom: 16px;
  letter-spacing: -.02em;
}

.final-cta__heading em {
  font-style: italic;
  color: var(--pink);
}

.final-cta__sub {
  font-size: 15px;
  color: rgba(255,255,255,.55);
  line-height: 1.75;
  margin-bottom: 42px;
  max-width: 480px;
  margin-left: auto;
  margin-right: auto;
}

.final-cta__price-preview {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  background: rgba(255,255,255,.06);
  border: 1.5px solid rgba(255,255,255,.12);
  border-radius: var(--r-full);
  padding: 12px 28px;
  margin-bottom: 34px;
  font-size: 14px;
  font-weight: 700;
  color: rgba(255,255,255,.70);
}
.final-cta__price-preview strong {
  font-family: 'Fraunces', serif;
  font-size: 1.4rem;
  color: var(--white);
  font-weight: 900;
}

.final-cta__btns {
  display: flex;
  gap: 14px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-cta-pink {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: var(--pink);
  color: var(--dark);
  padding: 17px 40px;
  border-radius: var(--r-full);
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: 15.5px;
  border: none;
  cursor: pointer;
  transition: var(--ease-spring);
  text-decoration: none;
  box-shadow: 0 10px 36px rgba(221,174,211,.40);
  letter-spacing: -.01em;
}
.btn-cta-pink:hover {
  transform: translateY(-4px) scale(1.03);
  box-shadow: 0 18px 50px rgba(221,174,211,.55);
  background: #e8c0df;
}
.btn-cta-pink:disabled {
  background: rgba(255,255,255,.10);
  color: rgba(255,255,255,.30);
  cursor: not-allowed;
  box-shadow: none;
  transform: none;
}

.btn-cta-ghost {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: transparent;
  color: rgba(255,255,255,.65);
  padding: 16px 32px;
  border-radius: var(--r-full);
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700;
  font-size: 14.5px;
  border: 2px solid rgba(255,255,255,.18);
  cursor: pointer;
  transition: var(--ease);
  text-decoration: none;
}
.btn-cta-ghost:hover {
  color: var(--white);
  border-color: rgba(255,255,255,.45);
  background: rgba(255,255,255,.06);
  transform: translateY(-2px);
}

/* ═══════════════════════════════════════════
   ANIMATIONS
═══════════════════════════════════════════ */
@keyframes floatIn {
  from { opacity: 0; transform: translateY(-16px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ═══════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════ */
@media (max-width: 980px) {
  .editorial-hero { grid-template-columns: 1fr; min-height: auto; }
  .editorial-hero__img { height: 55vw; min-height: 300px; }
  .editorial-hero__info { padding: 48px 32px 56px; }
  .editorial-hero__name { font-size: 2.8rem; }
  .about-section__inner { grid-template-columns: 1fr; gap: 48px; }
  .about-section__sticky { position: static; }
  .trust-grid { grid-template-columns: 1fr 1fr; }
  .stats-bar { flex-direction: column; align-items: flex-start; }
  .stats-bar__item + .stats-bar__item { padding-left: 0; border-left: none; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.15); }
}

@media (max-width: 640px) {
  .editorial-hero__info { padding: 36px 22px 44px; }
  .editorial-specs { grid-template-columns: 1fr 1fr; }
  .mood-section { height: 340px; }
  .trust-grid { grid-template-columns: 1fr; }
  .final-cta { clip-path: none; margin-top: 0; margin-bottom: 0; padding: 70px 5vw; }
  .final-cta__btns { flex-direction: column; align-items: center; }
  .btn-cta-pink, .btn-cta-ghost { width: 100%; justify-content: center; }
}
</style>

<!-- ═══════════════════════
     ① EDITORIAL HERO
═══════════════════════ -->
<section class="editorial-hero">

  <!-- Left: Image -->
  <div class="editorial-hero__img">
    <img src="<?php echo e(asset('storage/' . $pet->image)); ?>" alt="<?php echo e($pet->name); ?>">

    <div class="editorial-hero__label">
      <span class="dot <?php echo e($isSold ? 'sold' : (strtolower($pet->status) === 'pending' ? 'pending' : '')); ?>"></span>
      <?php echo e($isSold ? 'Sold' : ucfirst($pet->status)); ?>

    </div>

    <div class="editorial-hero__scroll">
      <span class="editorial-hero__scroll-line"></span>
      Scroll to explore
    </div>
  </div>

  <!-- Right: Info panel -->
  <div class="editorial-hero__info">

    <div class="editorial-hero__crumb">
      <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i></a>
      <i class="fas fa-chevron-right"></i>
      <a href="<?php echo e(route('pets')); ?>">Pets</a>
      <i class="fas fa-chevron-right"></i>
      <span style="color:rgba(255,255,255,.65);"><?php echo e($pet->name); ?></span>
    </div>

    <div class="editorial-tag">🐶 Pet for Sale</div>

    <h1 class="editorial-hero__name reveal">
      <em>meet</em>
      <?php echo e($pet->name); ?>

    </h1>

    <p class="editorial-hero__breed"><?php echo e($pet->breed ?? 'Lovely Pet'); ?> &nbsp;·&nbsp; <?php echo e(ucfirst($pet->gender ?? '')); ?> &nbsp;·&nbsp; <?php echo e($pet->age ? $pet->age . ' yrs' : ''); ?></p>

    <div class="editorial-rule"></div>

    <p class="editorial-hero__desc reveal reveal-delay-1"><?php echo e($pet->description); ?></p>

    <!-- Specs -->
    <div class="editorial-specs reveal reveal-delay-2">
      <div class="spec-item">
        <div class="spec-item__icon">🐾</div>
        <div class="spec-item__label">Breed</div>
        <div class="spec-item__val"><?php echo e($pet->breed ?? '—'); ?></div>
      </div>
      <div class="spec-item">
        <div class="spec-item__icon">📅</div>
        <div class="spec-item__label">Age</div>
        <div class="spec-item__val"><?php echo e($pet->age ? $pet->age . ' yrs' : '—'); ?></div>
      </div>
      <div class="spec-item">
        <div class="spec-item__icon">⚧</div>
        <div class="spec-item__label">Gender</div>
        <div class="spec-item__val"><?php echo e(ucfirst($pet->gender ?? '—')); ?></div>
      </div>
      <div class="spec-item">
        <div class="spec-item__icon">📍</div>
        <div class="spec-item__label">Location</div>
        <div class="spec-item__val">Morocco</div>
      </div>
    </div>

    <!-- Price -->
    <div class="editorial-price reveal reveal-delay-3">
      <span class="editorial-price__cur">MAD</span>
      <span class="editorial-price__val"><?php echo e(number_format($pet->price, 0)); ?></span>
      <span class="editorial-price__tag">Fixed<br>price</span>
    </div>

    <!-- Buttons -->
    <div class="editorial-btns reveal reveal-delay-4">
      <?php if($isSold): ?>
        <button class="btn-editorial-primary" disabled>
          <i class="fas fa-times-circle"></i> This pet is sold
        </button>
      <?php else: ?>
        <?php if(auth()->guard()->check()): ?>
          <form action="<?php echo e(route('buyer.buy', $pet->id)); ?>" method="POST" style="display:contents;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-editorial-primary">
              <i class="fas fa-shopping-bag"></i> Buy <?php echo e($pet->name); ?> Now
            </button>
          </form>
        <?php else: ?>
          <a href="<?php echo e(route('login')); ?>" class="btn-editorial-primary">
            <i class="fas fa-lock"></i> Login to Buy
          </a>
        <?php endif; ?>
      <?php endif; ?>
      <a href="<?php echo e(route('pets')); ?>" class="btn-editorial-secondary">
        <i class="fas fa-arrow-left"></i> Back to all listings
      </a>
    </div>

  </div>
</section>

<!-- ═══════════════════════
     ② STATS BAR
═══════════════════════ -->
<div class="stats-bar">
  <div class="stats-bar__item">
    <span class="stats-bar__icon">🐾</span>
    <div>
      <span class="stats-bar__val"><?php echo e($pet->breed ?? 'Mixed'); ?></span>
      <span class="stats-bar__lbl">Breed</span>
    </div>
  </div>
  <div class="stats-bar__item">
    <span class="stats-bar__icon">📅</span>
    <div>
      <span class="stats-bar__val"><?php echo e($pet->age ?? '?'); ?> years</span>
      <span class="stats-bar__lbl">Age</span>
    </div>
  </div>
  <div class="stats-bar__item">
    <span class="stats-bar__icon">⚧</span>
    <div>
      <span class="stats-bar__val"><?php echo e(ucfirst($pet->gender ?? 'Unknown')); ?></span>
      <span class="stats-bar__lbl">Gender</span>
    </div>
  </div>
  <div class="stats-bar__item">
    <span class="stats-bar__icon">💰</span>
    <div>
      <span class="stats-bar__val"><?php echo e(number_format($pet->price, 0)); ?> MAD</span>
      <span class="stats-bar__lbl">Price</span>
    </div>
  </div>
</div>

<!-- ═══════════════════════
     ③ ABOUT SECTION
═══════════════════════ -->
<section class="about-section">
  <div class="about-section__inner">

    <!-- Sticky left text -->
    <div class="about-section__sticky reveal">
      <div class="about-section__eyebrow">✦ About <?php echo e($pet->name); ?></div>
      <h2 class="about-section__heading">A companion<br>worth knowing</h2>
      <p class="about-section__body"><?php echo e($pet->description); ?></p>
      <a href="<?php echo e(route('pets')); ?>" style="display:inline-flex;align-items:center;gap:8px;font-size:13.5px;font-weight:700;color:var(--blue);text-decoration:none;transition:var(--ease);" onmouseover="this.style.color='var(--dark)'" onmouseout="this.style.color='var(--blue)'">
        <i class="fas fa-th-large"></i> Browse all pets
      </a>
    </div>

    <!-- Right: feature cards -->
    <div class="about-features">
      <div class="feature-card reveal reveal-delay-1">
        <div class="feature-card__icon-wrap">🏥</div>
        <div>
          <div class="feature-card__title">Health Verified</div>
          <div class="feature-card__text"><?php echo e($pet->name); ?> has been health-checked and vaccinated. All medical records are available upon request before purchase.</div>
        </div>
      </div>
      <div class="feature-card reveal reveal-delay-2">
        <div class="feature-card__icon-wrap">🏠</div>
        <div>
          <div class="feature-card__title">Home Raised</div>
          <div class="feature-card__text">Raised in a warm, loving family environment. Socialized with people and other animals from a very young age.</div>
        </div>
      </div>
      <div class="feature-card reveal reveal-delay-3">
        <div class="feature-card__icon-wrap">📋</div>
        <div>
          <div class="feature-card__title">Full Documentation</div>
          <div class="feature-card__text">Complete papers, breed certificate, and health records provided. Everything you need for a smooth, confident adoption.</div>
        </div>
      </div>
      <div class="feature-card reveal reveal-delay-4">
        <div class="feature-card__icon-wrap">🤝</div>
        <div>
          <div class="feature-card__title">Verified Seller</div>
          <div class="feature-card__text">The seller has been verified by PetShop. Communicate safely and confidently through our platform messaging system.</div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════
     ④ MOOD PHOTO
═══════════════════════ -->
<div class="mood-section">
  <img class="mood-section__img" src="<?php echo e(asset('storage/' . $pet->image)); ?>" alt="<?php echo e($pet->name); ?>">
  <div class="mood-section__overlay">
    <div class="mood-section__quote reveal">
      <blockquote>
        Until one has loved an animal, a part of one's soul remains unawakened.
      </blockquote>
      <cite>— Anatole France</cite>
    </div>
  </div>
</div>

<!-- ═══════════════════════
     ⑤ TRUST SECTION
═══════════════════════ -->
<section class="trust-section">
  <div class="trust-section__inner">
    <div class="trust-section__header reveal">
      <div class="trust-section__label">🛡️ Our Guarantee</div>
      <h2 class="trust-section__heading">Why Adopt Through PetShop?</h2>
    </div>
    <div class="trust-grid">
      <div class="trust-card reveal reveal-delay-1">
        <span class="trust-card__emoji">🔒</span>
        <h3 class="trust-card__title">Secure Transactions</h3>
        <p class="trust-card__text">Every transaction is protected. We verify sellers and monitor listings to ensure your safety and peace of mind.</p>
      </div>
      <div class="trust-card reveal reveal-delay-2">
        <span class="trust-card__emoji">💬</span>
        <h3 class="trust-card__title">Safe Communication</h3>
        <p class="trust-card__text">Message sellers directly through our platform without sharing personal contact information until you're ready.</p>
      </div>
      <div class="trust-card reveal reveal-delay-3">
        <span class="trust-card__emoji">🐾</span>
        <h3 class="trust-card__title">Animal Welfare First</h3>
        <p class="trust-card__text">We care deeply about every animal's wellbeing. Listings that don't meet our standards are removed immediately.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════
     ⑥ FINAL CTA
═══════════════════════ -->
<section class="final-cta">
  <div class="final-cta__inner reveal">
    <span class="final-cta__paw">🐾</span>
    <h2 class="final-cta__heading">
      Give <em><?php echo e($pet->name); ?></em><br>a Forever Home
    </h2>
    <p class="final-cta__sub">
      Great pets don't stay available for long. Make your move today and give <?php echo e($pet->name); ?> the loving home they deserve.
    </p>

    <div class="final-cta__price-preview">
      <span>Price</span>
      <strong><?php echo e(number_format($pet->price, 0)); ?> MAD</strong>
      <span>·</span>
      <span><?php echo e($pet->breed ?? 'Pet'); ?></span>
      <span>·</span>
      <span><?php echo e(ucfirst($pet->gender ?? '')); ?></span>
    </div>

    <div class="final-cta__btns">
      <?php if($isSold): ?>
        <button class="btn-cta-pink" disabled>
          <i class="fas fa-times-circle"></i> Already Sold
        </button>
      <?php else: ?>
        <?php if(auth()->guard()->check()): ?>
          <form action="<?php echo e(route('buyer.buy', $pet->id)); ?>" method="POST" style="display:contents;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-cta-pink">
              <i class="fas fa-shopping-bag"></i> Buy <?php echo e($pet->name); ?> Now
            </button>
          </form>
        <?php else: ?>
          <a href="<?php echo e(route('login')); ?>" class="btn-cta-pink">
            <i class="fas fa-lock"></i> Login to Buy
          </a>
        <?php endif; ?>
      <?php endif; ?>
      <a href="<?php echo e(route('pets')); ?>" class="btn-cta-ghost">
        <i class="fas fa-search"></i> Browse More Pets
      </a>
    </div>
  </div>
</section>

<!-- Scroll reveal script -->
<script>
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layoutPets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/pages/petsShow.blade.php ENDPATH**/ ?>