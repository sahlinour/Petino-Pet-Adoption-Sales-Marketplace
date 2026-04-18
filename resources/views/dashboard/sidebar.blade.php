@php
$role = Auth::user()->role; // 'seller' ou 'buyer'
@endphp

<nav class="nav flex-column">
    @if($role == 'seller')
        <a class="nav-link" href="{{ route('dashboard.seller') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('pets.index') }}">Mes Annonces</a>
        <a class="nav-link" href="{{ route('orders.index') }}">Historique Ventes</a>
        <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
        <a class="nav-link" href="{{ route('profile') }}">Profil</a>
    @else
        <a class="nav-link" href="{{ route('dashboard.buyer') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('orders.index') }}">Historique Achats</a>
        <a class="nav-link" href="{{ route('pets.index') }}">Derniers Pets</a>
        <a class="nav-link" href="{{ route('profile') }}">Profil</a>
    @endif
</nav>