@extends('layouts.layoutPets')

@section('title', 'Pets List')

@section('content')


<section class="happy-section fade-in">
  <div class="wrap">
    <div class="happy__grid">

      <!-- Left: image -->
      <div class="happy__visual">
        <div class="happy__img-frame">
          <img src="{{ asset('images/headshot-happy-smiling-dark-skinned-afro-american-woman-holds-nice-breed-dog-expresses-positive-emotions-has-dreamy-expression-going-have-walk-with-favorite-pet-people-animals-concept.jpg') }}" alt="Happy pets">
        </div>
        <div class="happy__pill hp-a">🐶 2.4K+ Pets Adopted</div>
        <div class="happy__pill hp-b">⭐ 98% Happy Owners</div>
      </div>

      <!-- Right: text -->
      <div class="happy__text">
        <div class="cat__intro">
        <span class="label-tag">🐶 Explore</span>
        <h2 class="section-heading">Find Your Dream Pet Today</h2>
        <p class="section-sub">
           Explore adorable dogs, cats, birds and more.
           Healthy pets from trusted sellers waiting for a loving home.
        </p>
        <div class="cat__tags">
          <div class="cat__tag">🐕 Dogs</div>
          <div class="cat__tag">🐈 Cats</div>
          <div class="cat__tag">🐦 Birds</div>
          <div class="cat__tag">🐇 Rabbits
            
          </div>
        </div>
        <a href="#" class="btn btn-action">Browse Pets →</a>
      </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= FILTERS ================= -->
<section class="pets-filters container">
    <form method="GET" action="{{ route('pets') }}" class="filters-form grid-filters">
        <!-- Category Filter -->
        <div class="filter-group">
            <i class="fas fa-paw"></i>
            <select name="category" id="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Breed Filter -->
        <div class="filter-group">
            <i class="fas fa-search"></i>
            <input type="text" name="breed" id="breed" value="{{ request('breed') }}" placeholder="Breed">
        </div>

        <!-- Max Price Filter -->
        <div class="filter-group">
            <i class="fas fa-dollar-sign"></i>
            <input type="number" name="price" id="price" value="{{ request('price') }}" placeholder="Max Price">
        </div>

        <!-- Max Age Filter -->
        <div class="filter-group">
            <i class="fas fa-calendar-alt"></i>
            <input type="number" name="age" id="age" value="{{ request('age') }}" placeholder="Max Age">
        </div>

        <!-- Submit Button -->
        <div class="filter-group">
            <button type="submit" class="btn-filter">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
        </div>
    </form>
</section>


<!-- ================= PETS GRID DYNAMIQUE ================= -->
<section class="pets-list container" id="pets-list">
    <div class="pets-grid">
        @forelse($pets as $pet)
        <div class="pet-card">
            <div class="pet-card__image">
                <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
                <span class="pet-type {{ strtolower($pet->status) }}">{{ ucfirst($pet->status) }}</span>
            </div>

            <div class="pet-card__content">
                <h3>{{ $pet->name }}</h3>
                <p>{{ ucfirst($pet->description) }}</p>
                <span class="price">{{ $pet->price }} MAD</span>

                <a href="{{ route('pets.petsShow', $pet->id) }}" class="btn-details">
                    View Details
                </a>
            </div>
        </div>
        @empty
            <p>No pets found.</p>
        @endforelse
    </div>

   <!-- Pagination -->
@if ($pets->lastPage() > 1)
<nav class="custom-pagination">
    <ul>
        {{-- Previous Page Link --}}
        @if ($pets->onFirstPage())
            <li class="disabled">&laquo;</li>
        @else
            <li>
                <a href="{{ $pets->previousPageUrl() }}">&laquo;</a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $pets->lastPage(); $i++)
            <li class="{{ $pets->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $pets->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        @if ($pets->hasMorePages())
            <li>
                <a href="{{ $pets->nextPageUrl() }}">&raquo;</a>
            </li>
        @else
            <li class="disabled">&raquo;</li>
        @endif
    </ul>
</nav>
@endif

</section>

<!-- ══════════════════════════════════════
     ⑥ PROMO BANNERS
══════════════════════════════════════ -->
<section class="promo-section fade-in">
  <div class="promo__heading">
    <span class="label-tag">🐾 Find Your New Best Friend </span>
    <h2 class="section-heading">Ready to <br> Welcome  a Loving Pet Home?</h2>
  </div>
    
    <div class="promo-card__title">
        Discover adorable pets waiting for care, love, and a happy family.
        Start your journey today and meet your perfect companion.
       <br>
        <a href="#" class="btn btn-action">Join Now →</a>
      </div>
   
  
</section>


@endsection
