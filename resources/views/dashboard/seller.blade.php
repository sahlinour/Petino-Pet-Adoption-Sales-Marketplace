@extends('layouts.layoutDashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ Auth::user()->role == 'seller' ? 'Dashboard Seller' : 'Dashboard Buyer' }}</h1>

    <div class="row">
        <!-- Exemple carte -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Pets</div>
                <div class="card-body">
                    <h5 class="card-title">150</h5>
                    <p class="card-text">Pets disponibles.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Orders</div>
                <div class="card-body">
                    <h5 class="card-title">45</h5>
                    <p class="card-text">Commandes récentes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection