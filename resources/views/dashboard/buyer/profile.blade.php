{{-- resources/views/dashboard/buyer/profile.blade.php --}}
@extends('layouts.layoutDashboard')

@section('title', 'Profile - Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Mon Profil</h1>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow-sm p-4">
                <h5 class="mb-3">Informations personnelles</h5>
                <div class="mb-4 p-3 bg-light rounded">
                    <p><strong>Nom :</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email :</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Rôle :</strong> {{ ucfirst(auth()->user()->role) }}</p>
                    <p><strong>Date d'inscription :</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                </div>

                <hr>

                <h5 class="mb-3">Modifier mes informations</h5>
                <form action="{{ route('dashboard.buyer.profile.update') }}" method="POST" class="p-3 bg-white rounded shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Nom" required>
                        <label for="name">Nom</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                        <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2" style="font-weight: bold; font-size: 16px;">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Form hover and focus effects */
    .form-control:focus {
        border-color: #307192;
        box-shadow: 0 0 0 0.2rem rgba(48, 113, 146, 0.25);
    }

    .card h5 {
        color: #307192;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #1f5c72;
        border-color: #1f5c72;
    }
</style>
@endsection