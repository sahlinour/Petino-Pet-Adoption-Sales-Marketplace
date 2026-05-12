<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pet;
use App\Models\Listing;

class OrderController extends Controller
{
    /**
     * Acheter un pet
     */
    public function buy($listingId)
    {
        $listing = Listing::findOrFail($listingId);

        if ($listing->status === 'sold') {
            return back()->with('error', 'This item is already sold.');
        }

        Order::create([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id,
            'total_price' => $listing->price,
            'status' => 'pending',
        ]);

        $listing->update([
            'status' => 'sold'
        ]);

        return redirect()
            ->route('dashboard.buyer.historique')
            ->with('success', 'Purchase successful!');
    }

    /**
     * Historique des achats
     */
    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
                    ->latest()
                    ->get();

        return view('dashboard.buyer.historique', compact('orders'));
    }
}