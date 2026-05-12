{{-- resources/views/dashboard/buyer/favorites.blade.php --}}

@extends('layouts.layoutDashboard')

@section('title', 'Mes Favoris')

@section('content')

<div class="favorites-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="page-title">
                <i class="fas fa-heart"></i>
                Mes Favoris
            </h1>

            <p class="page-subtitle">
                Retrouvez tous vos animaux favoris enregistrés.
            </p>
        </div>

        <div class="favorites-count">
            {{ $favorites->count() }} Favoris
        </div>

    </div>

    {{-- FAVORITES LIST --}}
    @if($favorites->count() > 0)

        <div class="favorites-grid">

            @foreach($favorites as $favorite)

                <div class="favorite-card">

                    {{-- IMAGE --}}
                    <div class="favorite-image">

                        @if($favorite->pet->image)
                            <img src="{{ asset('storage/' . $favorite->pet->image) }}"
                                 alt="{{ $favorite->pet->name }}">
                        @else
                            <img src="https://via.placeholder.com/400x250"
                                 alt="Pet">
                        @endif

                        <span class="pet-status">
                            {{ ucfirst($favorite->pet->status) }}
                        </span>

                    </div>

                    {{-- CONTENT --}}
                    <div class="favorite-content">

                        <h3>
                            {{ $favorite->pet->name }}
                        </h3>

                        <p class="pet-breed">
                            {{ $favorite->pet->breed }}
                        </p>

                        <div class="pet-info">

                            <span>
                                <i class="fas fa-calendar"></i>
                                {{ $favorite->pet->age }} ans
                            </span>

                            <span>
                                <i class="fas fa-tag"></i>
                                {{ number_format($favorite->pet->price, 2) }} MAD
                            </span>

                        </div>

                        <div class="favorite-actions">

                            <a href="{{ route('pets.petsShow', $favorite->pet->id) }}"
                               class="btn-view">

                                <i class="fas fa-eye"></i>
                                Voir

                            </a>

                            <form action="{{ route('buyer.favorites.delete', $favorite->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="empty-state">

            <i class="fas fa-heart-broken"></i>

            <h2>Aucun favori</h2>

            <p>
                Vous n’avez encore ajouté aucun animal aux favoris.
            </p>

            <a href="{{ route('pets') }}"
               class="browse-btn">

                Découvrir les animaux

            </a>

        </div>

    @endif

</div>

<style>

/* ================= PAGE ================= */

.favorites-page{
    padding:40px;
}

/* ================= HEADER ================= */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:40px;
    flex-wrap:wrap;
    gap:20px;
}

.page-title{
    font-size:34px;
    font-weight:800;
    color:#213C51;
    margin-bottom:10px;
}

.page-title i{
    color:#DDAED3;
    margin-right:10px;
}

.page-subtitle{
    color:#7f97a5;
    font-size:15px;
}

.favorites-count{
    background:linear-gradient(135deg,#6594B1,#DDAED3);
    color:#fff;
    padding:14px 24px;
    border-radius:999px;
    font-weight:700;
    box-shadow:0 10px 25px rgba(33,60,81,.15);
}

/* ================= GRID ================= */

.favorites-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:30px;
}

/* ================= CARD ================= */

.favorite-card{
    background:rgba(255,255,255,.88);
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(33,60,81,.12);
    transition:.35s ease;
    position:relative;
}

.favorite-card:hover{
    transform:translateY(-10px);
}

/* ================= IMAGE ================= */

.favorite-image{
    position:relative;
    height:240px;
    overflow:hidden;
}

.favorite-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.5s ease;
}

.favorite-card:hover img{
    transform:scale(1.08);
}

.pet-status{
    position:absolute;
    top:15px;
    right:15px;
    background:#fff;
    color:#213C51;
    padding:8px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
}

/* ================= CONTENT ================= */

.favorite-content{
    padding:25px;
}

.favorite-content h3{
    font-size:24px;
    color:#213C51;
    margin-bottom:6px;
    font-weight:700;
}

.pet-breed{
    color:#6594B1;
    margin-bottom:20px;
    font-weight:600;
}

.pet-info{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
    color:#4f6a7a;
    font-size:14px;
}

.pet-info span{
    display:flex;
    align-items:center;
    gap:8px;
}

/* ================= ACTIONS ================= */

.favorite-actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.btn-view{
    flex:1;
    background:linear-gradient(135deg,#6594B1,#DDAED3);
    color:#fff;
    padding:14px;
    border-radius:18px;
    text-align:center;
    text-decoration:none;
    font-weight:700;
    transition:.3s ease;
}

.btn-view:hover{
    transform:translateY(-3px);
    color:#fff;
}

.btn-delete{
    width:52px;
    height:52px;
    border:none;
    border-radius:16px;
    background:#ffe3e3;
    color:#ff4d4d;
    margin-left:12px;
    transition:.3s ease;
}

.btn-delete:hover{
    background:#ff4d4d;
    color:#fff;
}

/* ================= EMPTY ================= */

.empty-state{
    text-align:center;
    padding:80px 20px;
    background:#fff;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(33,60,81,.08);
}

.empty-state i{
    font-size:70px;
    color:#DDAED3;
    margin-bottom:20px;
}

.empty-state h2{
    color:#213C51;
    margin-bottom:10px;
}

.empty-state p{
    color:#7f97a5;
    margin-bottom:30px;
}

.browse-btn{
    display:inline-block;
    padding:14px 28px;
    background:linear-gradient(135deg,#6594B1,#DDAED3);
    color:#fff;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    .favorites-page{
        padding:20px;
    }

    .page-title{
        font-size:26px;
    }

    .page-header{
        flex-direction:column;
        align-items:flex-start;
    }
}

</style>

@endsection