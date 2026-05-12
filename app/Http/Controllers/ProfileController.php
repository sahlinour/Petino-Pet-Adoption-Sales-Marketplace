<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     // ---------------- BUYER ----------------
    public function buyerIndex()
    {
        return view('dashboard.buyer.profile', [
            'user' => auth()->user()
        ]);
    }

    public function buyerUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user->update($request->only('name','email'));

        return back()->with('success','Profile updated (buyer)');
    }

    // ---------------- SELLER ----------------
    public function sellerIndex()
    {
        return view('dashboard.seller.profile', [
            'user' => auth()->user()
        ]);
    }

    public function sellerUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user->update($request->only('name','email'));

        return back()->with('success','Profile updated (seller)');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('dashboard.profile');
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
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
