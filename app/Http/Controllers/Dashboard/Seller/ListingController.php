<?php

namespace App\Http\Controllers\Dashboard\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Pet;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::whereHas('pet', function ($query) {

            $query->where('user_id', auth()->id());

        })
        ->with('pet')
        ->latest()
        ->get();

        return view('dashboard.seller.annonces', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::where('user_id', auth()->id())->get();
        return view('dashboard.seller.add-annonce', compact('pets'));
  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'status' => 'required|in:active,pending,sold,expired',
            'location' => 'nullable|string|max:255',
        ]);

        $pet = Pet::where('id', $request->pet_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        Listing::create([
            'pet_id'       => $pet->id,
            'title'        => $request->title,
            'description'  => $request->description,
            'price'        => $request->price,
            'status'       => $request->status,
            'location'     => $request->location,
            'published_at' => now(),
        ]);

        return redirect()
            ->route('dashboard.seller.annonces')
            ->with('success', 'Annonce créée avec succès.');
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
        $listing = Listing::with('pet')->findOrFail($id);

        $pets = Pet::where('user_id', auth()->id())->get();

        return view('dashboard.seller.edit-annonce', compact(
            'listing',
            'pets'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $listing = Listing::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'location' => 'nullable|max:255',
        ]);

        $listing->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return redirect()
            ->route('seller.listings')
            ->with('success', 'Annonce modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);

        $listing->delete();

        return back()->with('success', 'Annonce supprimée.');
    }
}