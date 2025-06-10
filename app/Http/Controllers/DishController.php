<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('beheer.menukaart.index', compact('dishes'));
    }

    public function create()
    {
        return view('beheer.menukaart.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string'
        ]);

        Dish::create($validated);

        return redirect()->route('beheer.menukaart.index')->with('success', 'Gerecht toegevoegd!');
    }

    public function edit(Dish $dish)
    {
        return view('beheer.menukaart.edit', compact('dish'));
    }

    public function update(Request $request, Dish $dish)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string'
        ]);

        $dish->update($validated);

        return redirect()->route('beheer.menukaart.index')->with('success', 'Gerecht bijgewerkt!');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('beheer.menukaart.index')->with('success', 'Gerecht verwijderd!');
    }
}
