<?php

namespace App\Http\Controllers;
use App\Models\Pet;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupère les statistiques des animaux
        $totalPets = Pet::count(); // Total d'animaux
        $availablePets = Pet::where('status', 'Available')->count(); // Animaux disponibles
     //   $soldPets = Pet::where('status', 'Sold')->count(); // Animaux vendus

        // Autres statistiques si nécessaire
     //   $totalSales = Sale::count(); // Total des ventes

        // Passe les données à la vue
        return view('dashboard.dashboard', compact('totalPets', 'availablePets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
