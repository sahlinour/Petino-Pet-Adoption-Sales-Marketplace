{{-- resources/views/dashboard/buyer/historique.blade.php --}}
@extends('layouts.layoutDashboard')

@section('content')

    <!-- Main Content -->
   <div class="container mt-5">
            <h1 class="text-center mb-4">Historique de vos achats</h1>

            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Animal</th>
                                <th>Prix</th>
                                <th>Date de commande</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->pet->name }}</td>
                                    <td>{{ number_format($order->total_price, 2) }} MAD</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-success">Terminé</span>
                                        @else
                                            <span class="badge bg-danger">Annulé</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    Vous n'avez encore passé aucune commande.
                </div>
            @endif
        
    </div>

   @endsection