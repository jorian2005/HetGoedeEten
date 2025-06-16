<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $artikel = Article::findOrFail($artikelId);
        $artikel->update(['stock' => $validated['stock']]);

        return redirect()->route('chef.index')->with('success', 'Voorraad bijgewerkt!');
    }

    public function markeerAlsKlaar(Request $request, Order $order)
    {
        $chefmail = \App\Models\User::role('chef')->pluck('email')->toArray();
        $lowStockArticles = [];

        foreach ($order->gerechten as $gerecht) {
            foreach ($gerecht->dishIngredients as $ingredient) {
                $artikel = $ingredient->artikel;
                if ($artikel) {
                    $artikel->decrement('stock', 1);
                    if ($artikel->stock < $artikel->minimum_stock) {
                        $key = $artikel->name;
                        if (!isset($lowStockArticles[$key])) {
                            $lowStockArticles[$key] = [
                                'name' => $artikel->name,
                                'stock' => $artikel->stock,
                                'minimum_stock' => $artikel->minimum_stock
                            ];
                        }
                    }
                }
            }
        }
        if (!empty($lowStockArticles)) {
            Mail::to($chefmail)->send(new \App\Mail\LowStockAlert($lowStockArticles));
        }
        $order->update(['status' => 'klaar']);
        return redirect()->route('chef.index')->with('success', 'Bestelling gemarkeerd als klaar!');
    }
}

