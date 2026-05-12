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
                <form action="{{ route('profile.update') }}" method="POST" class="p-3 bg-white rounded shadow-sm">
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

/* ================= PROFILE PAGE STYLE ================= */

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

    --shadow-sm:0 6px 18px rgba(33,60,81,.10);
    --shadow-md:0 15px 35px rgba(33,60,81,.14);

    --radius-md:20px;
    --radius-lg:30px;

    --transition:.35s ease;
}

body{
    background:
        linear-gradient(135deg, rgba(217,231,240,.5), rgba(245,229,242,.5)),
        #f8fafc;
}

/* ================= CONTAINER ================= */

.container{
    padding-top:40px;
}

/* ================= TITLE ================= */

h1{
    font-size:32px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:30px;
    position:relative;
}

h1::after{
    content:"";
    width:80px;
    height:4px;
    background:linear-gradient(135deg,var(--blue),var(--pink));
    display:block;
    margin:10px auto 0;
    border-radius:999px;
}

/* ================= CARD ================= */

.card{
    border:none;
    border-radius:var(--radius-lg);
    background:rgba(255,255,255,.85);
    backdrop-filter:blur(15px);
    box-shadow:var(--shadow-sm);
    transition:var(--transition);
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:var(--shadow-md);
}

.card h5{
    color:var(--dark);
    font-weight:700;
}

/* ================= INFO BOX ================= */

.bg-light{
    background:linear-gradient(135deg,var(--blue-soft),var(--pink-soft)) !important;
    border-radius:16px;
    padding:20px;
}

.bg-light p{
    margin-bottom:8px;
    color:var(--text-mid);
}

/* ================= FORM ================= */

.form-control{
    border:none;
    border-radius:16px;
    padding:14px 16px;
    background:var(--blue-soft);
    transition:var(--transition);
}

.form-control:focus{
    background:#fff;
    box-shadow:0 0 0 4px rgba(101,148,177,.18);
    border:none;
}

label{
    color:var(--text-mid);
    font-weight:500;
}

/* ================= BUTTON ================= */

.btn-primary{
    background:linear-gradient(135deg,var(--blue),var(--pink));
    border:none;
    border-radius:16px;
    padding:12px;
    font-weight:700;
    transition:var(--transition);
    box-shadow:var(--shadow-sm);
}

.btn-primary:hover{
    transform:translateY(-3px);
    box-shadow:var(--shadow-md);
}

/* ================= HR ================= */

hr{
    margin:25px 0;
    border-color:rgba(101,148,177,.2);
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    h1{
        font-size:24px;
    }

    .card{
        padding:20px !important;
    }
}

</style>
@endsection