<?php

namespace App\Http\Controllers\Dashboard\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Pet;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())->get();

        return view('dashboard.buyer.favorites', compact('favorites'));
    }

     public function add($listingId)
    {
        Favorite::create([
            'user_id' => auth()->id(),
            'listing_id' => $listingId
        ]);

        return back()->with('success', 'Added to favorites');
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
        $pet = Pet::findOrFail($id);

        // Vérifier si déjà en favoris
        $exists = Favorite::where('user_id', auth()->id())
            ->where('pet_id', $pet->id)
            ->exists();

        if (!$exists) {

            Favorite::create([
                'user_id' => auth()->id(),
                'pet_id' => $pet->id,
            ]);
        }

        return back()->with(
            'success',
            'Animal ajouté aux favoris avec succès.'
        );
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
        $favorite = Favorite::where('user_id', auth()->id())
            ->findOrFail($id);

        $favorite->delete();

        return back()->with(
            'success',
            'Favori supprimé avec succès.'
        );
    }
}
