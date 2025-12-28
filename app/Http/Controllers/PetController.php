<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pet::query();
        $categories = Category::all();
    
        // Filtrer par catégorie
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        // Filtrer par race
        if ($request->has('breed') && $request->breed != '') {
            $query->where('breed', $request->breed);
        }
    
        // Filtrer par prix
        if ($request->has('price') && $request->price != '') {
            $query->where('price', '<=', $request->price);
        }
    
        // Filtrer par âge
        if ($request->has('age') && $request->age != '') {
            $query->where('age', '<=', $request->age);
        }
    
        // Récupérer les animaux filtrés
        $pets = $query->get();
    
        $categories = Category::all();
    
        return view('dashboard.pets', compact('pets', 'categories'));
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
    public function show($id)
    {
        // Récupérer l'animal par son ID
        $pet = Pet::findOrFail($id);

        // Vérifier si l'animal est déjà vendu
        $isSold = $pet->status === 'sold';

        return view('dashboard.showPets', compact('pet', 'isSold'));
    }

    // Méthode pour acheter un animal
    public function buy($id)
    {
        // Récupérer l'animal par son ID
        $pet = Pet::findOrFail($id);

        // Vérifier si l'animal est déjà vendu
        if ($pet->status === 'sold') {
            return redirect()->route('pets')->with('error', 'This pet has already been sold.');
        }

        // Mettre à jour le statut de l'animal à "sold"
        $pet->status = 'sold';
        $pet->save();

    
        // Rediriger avec un message de succès
        return redirect()->route('pets')->with('success', 'Thank you for your purchase!');
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
