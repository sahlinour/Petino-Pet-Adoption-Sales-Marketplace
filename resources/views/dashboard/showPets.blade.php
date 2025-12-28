@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styleShow.css') }}">
@endsection

@section('content')
    <section>
        <div class="containerr flex">
            <div class="left">
                <!-- Image principale de l'animal -->
                <div class="main_image">
                    <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}" class="slide">
                </div>
                <div class="option flex">
                    <!-- Affichage des images supplémentaires de l'animal -->
                    @foreach ($pet->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" onclick="changeMainImage(this.src)">
                    @endforeach
                </div>
            </div>

            <div class="right">
                <!-- Informations sur l'animal -->
                <h3 class="nompet">{{ $pet->name }}</h3>
                <p class="breedpet"><strong>Breed :</strong> {{ $pet->breed }}</p>
                <p class="descpet"><strong>Description :</strong> {{ $pet->description }}</p>
                <p class="genderpet"><strong>Gender :</strong> {{ $pet->gender }} </p>
                <p class="agepet"><strong>Age :</strong> {{ $pet->age }} years</p>
                
                <!-- Vérifier si l'animal est déjà vendu -->
                @if ($isSold)
                    <p>This pet has already been sold.</p>
                @else
                    <!-- Formulaire d'achat -->
                    <form action="{{ route('pets.buy', $pet->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">Buy Now</button>
                    </form>
                @endif
                <div class="price-fav-container">
                    <h4 class="pricepet">
                        <small>$</small>{{ $pet->price }}
                    </h4>
                    <button class="favorite-btn">
                        <i class="fa-regular fa-heart"></i>
                    </button>
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
