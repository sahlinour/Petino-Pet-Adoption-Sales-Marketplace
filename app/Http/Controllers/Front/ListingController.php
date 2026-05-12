<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Pet;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Listing::with('pet');

        // filtres
        if ($request->category) {
            $query->whereHas('pet', function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });
        }

        if ($request->breed) {
            $query->whereHas('pet', function ($q) use ($request) {
                $q->where('breed', 'like', '%' . $request->breed . '%');
            });
        }

        if ($request->price) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->age) {
            $query->whereHas('pet', function ($q) use ($request) {
                $q->where('age', '<=', $request->age);
            });
        }

        $listings = $query->latest()->paginate(6)->withQueryString();

        $categories = \App\Models\Category::all();

        return view('pages.petsList', compact('listings', 'categories'));
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
        $listing = Listing::with('pet')->findOrFail($id);

        return view('pages.petsShow', compact('listing'));
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
        $annonce = Listing::whereHas('pet', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $annonce->delete();

        return back()->with('success', 'Annonce supprimée avec succès!');
    }
}