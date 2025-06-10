<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Artikel;  // ipv Ingredient
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $openBestellingen = Order::where('status', 'open')->with('gerechten')->get();

        return view('chef.index', compact('openBestellingen'));
    }


    public function updateVoorraad(Request $request, $artikelId)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $artikel = Artikel::findOrFail($artikelId);
        $artikel->update(['stock' => $validated['stock']]);

        return redirect()->route('chef.index')->with('success', 'Voorraad bijgewerkt!');
    }

    public function markeerAlsKlaar(Request $request, Order $order)
    {
        $order->update(['status' => 'klaar']);
        return redirect()->route('chef.index')->with('success', 'Bestelling gemarkeerd als klaar!');
    }
}

