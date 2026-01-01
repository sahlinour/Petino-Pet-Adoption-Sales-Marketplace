@extends('layouts.layoutPets')

@section('title', 'Pets List')

@section('content')

<!-- ================= PETS HERO ================= -->
<section class="pets-hero">
    <div class="pets-hero__overlay"></div>
    <div class="pets-hero__content">
        <h2>
            <i class="fas fa-paw"></i>
            Find Your Perfect Pet
        </h2>
        <p>
            Browse our available pets and use filters to find your perfect companion.
        </p>
        <a href="#pets-list" class="btn-hero">Browse Pets</a>
    </div>
</section>

<!-- ================= STATS ================= -->
<section class="pets-stats">
    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-dog"></i>
            <h3>120+</h3>
            <p>Dogs</p>
        </div>

        <div class="stat-card">
            <i class="fas fa-cat"></i>
            <h3>90+</h3>
            <p>Cats</p>
        </div>

        <div class="stat-card">
            <i class="fas fa-dove"></i>
            <h3>45+</h3>
            <p>Birds</p>
        </div>

        <div class="stat-card">
            <i class="fas fa-heart"></i>
            <h3>300+</h3>
            <p>Happy Adoptions</p>
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
                <span class="pet-type {{ strtolower($pet->type) }}">{{ ucfirst($pet->type) }}</span>
            </div>

            <div class="pet-card__content">
                <h3>{{ $pet->name }}</h3>
                <p><i class="fas fa-map-marker-alt"></i> {{ ucfirst($pet->city) }}</p>
                <p class="price">{{ $pet->price }} MAD</p>

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



@endsection
