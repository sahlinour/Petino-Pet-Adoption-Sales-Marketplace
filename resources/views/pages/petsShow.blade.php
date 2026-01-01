@extends('layouts.layoutPets')

@section('title', $pet->name)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/stylePetsShow.css') }}">
@endsection

@section('content')

<!-- ================= PET HERO ================= -->
<section class="pet-hero">
    <div class="pet-hero__overlay"></div>
    <div class="pet-hero__content container">
        <h2><i class="fas fa-paw"></i> {{ $pet->name }}</h2>
        <p>Learn more about your potential companion and find all the details below.</p>
        <a href="{{ route('pets') }}" class="btn-hero"><i class="fas fa-arrow-left"></i> Back to Pets</a>
    </div>
</section>

<!-- ================= PET DETAILS ================= -->
<section class="pet-details">
    <div class="containerr flex">
        <!-- LEFT: Images -->
        <div class="left">
            <div class="main_image">
                <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}" class="slide">
            </div>
            <div class="option flex">
                @foreach ($pet->images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" onclick="changeMainImage(this.src)">
                @endforeach
            </div>
        </div>

        <!-- RIGHT: Infos -->
        <div class="right">
            <h3 class="nompet">{{ $pet->name }}</h3>
            <p class="breedpet"><strong>Breed:</strong> {{ $pet->breed }}</p>
            <p class="descpet"><strong>Description:</strong> {{ $pet->description }}</p>
            <p class="genderpet"><strong>Gender:</strong> {{ $pet->gender }}</p>
            <p class="agepet"><strong>Age:</strong> {{ $pet->age }} years</p>

            <div class="price-fav-container">
                <h4 class="pricepet"><small>$</small>{{ $pet->price }}</h4>
                <button class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
            </div>

            @if ($isSold)
                <p class="sold-text">This pet has already been sold.</p>
            @else
                <form action="{{ route('pets.buy', $pet->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn-buy">Buy Now</button>
                </form>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    function changeMainImage(src) {
        document.querySelector('.slide').src = src;
    }
</script>
@endsection
