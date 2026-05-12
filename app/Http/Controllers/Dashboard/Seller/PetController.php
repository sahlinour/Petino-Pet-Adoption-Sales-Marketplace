<?php

namespace App\Http\Controllers\Dashboard\Seller;

use App\Http\Controllers\Controller;
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
       $pets = $query->paginate(6)->withQueryString();

    
        $categories = Category::all();
    
        return view('pages.petsList', compact('pets', 'categories'));
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
        
        $pet = Pet::findOrFail($id);

        $isSold = $pet->status === 'sold';

        return view('pages.petsShow', compact('pet', 'isSold'));
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