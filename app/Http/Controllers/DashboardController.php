<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if(auth()->user()->role === 'seller'){
            return redirect()->route('dashboard.seller.annonces');
        } else {
            return redirect()->route('dashboard.buyer.historique');
        }
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

    public function buyerHistorique() {
    $user = auth()->user();
    $orders = $user->orders; 
    return view('dashboard.buyer.historique', compact('orders'));
    }

    public function buyerDerniersAchats()
    {
        $recentOrders = auth()->user()->orders()->latest()->take(5)->with('pet')->get();
        return view('dashboard.buyer.dernieres-achats', compact('recentOrders'));
    }

    public function buyerProfile()
    {
        $user = auth()->user();
        return view('dashboard.buyer.profile', compact('user'));
    }

    public function buyerUpdateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('dashboard.buyer.profile')->with('success', 'Profil mis à jour !');
    }

    public function sellerAnnonces() {
        $pets = auth()->user()->pets; 
        return view('dashboard.seller.annonces', compact('pets'));
    }
    public function sellerAddAnnonce() {
        return view('dashboard.seller.add-annonce');
    }
    public function sellerStoreAnnonce(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $pet = new Pet();
        $pet->name = $request->name;
        $pet->description = $request->description;
        $pet->price = $request->price;
        $pet->seller_id = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/pets');
            $pet->image_path = str_replace('public/', 'storage/', $path);
        }

        $pet->save();

        return redirect()->route('dashboard.seller.annonces')->with('success', 'Annonce créée avec succès !');
    }
    
    public function sellerProfile() {
        $user = auth()->user();
        return view('dashboard.seller.profile', compact('user'));
    }
    public function sellerHistorique() {
        $user = auth()->user();
        $orders = Order::whereHas('pet', function ($query) use ($user) {
            $query->where('seller_id', $user->id);
        })->with('pet')->get();
        return view('dashboard.seller.historique', compact('orders'));
    }
    public function sellerMessages() {
        return view('dashboard.seller.messages');
    }
}

