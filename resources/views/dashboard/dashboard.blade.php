@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Pets</div>
                <div class="card-body">
                    <h5 class="card-title">150</h5>
                    <p class="card-text">Pets available for sale.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Active Sellers</div>
                <div class="card-body">
                    <h5 class="card-title">45</h5>
                    <p class="card-text">Registered and active sellers.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pending Orders</div>
                <div class="card-body">
                    <h5 class="card-title">23</h5>
                    <p class="card-text">Orders awaiting confirmation.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="#" class="btn btn-outline-primary">View All Pets</a>
        <a href="#" class="btn btn-outline-secondary">Manage Sellers</a>
    </div>

    
</div>
<canvas id="petsChart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('petsChart').getContext('2d');
    const petsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Available', 'Sold'],
            datasets: [{
                label: 'Number of Pets',
                data: [{{ $availablePets }}],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
