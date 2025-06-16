<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Article; // Importeer Article
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        $articles = Article::all();
        return view('dishes.create', compact('articles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'article_ids' => 'nullable|array',
            'article_ids.*' => 'exists:articles,id',
        ]);

        $dish = Dish::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'type' => $validated['type'],
        ]);

        if (isset($validated['article_ids'])) {
            $dish->articles()->attach($validated['article_ids']);
        }

        return redirect()->route('dishes.index')->with('success', 'Gerecht toegevoegd!');
    }

    public function edit(Dish $dish)
    {
        $articles = Article::all();
        $selectedArticleIds = $dish->articles->pluck('id')->toArray();

        return view('dishes.edit', compact('dish', 'articles', 'selectedArticleIds'));
    }

    public function update(Request $request, Dish $dish)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'article_ids' => 'nullable|array',
            'article_ids.*' => 'exists:articles,id',
        ]);

        $dish->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'type' => $validated['type'],
        ]);

        $dish->articles()->sync($validated['article_ids'] ?? []);

        return redirect()->route('dishes.index')->with('success', 'Gerecht bijgewerkt!');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index')->with('success', 'Gerecht verwijderd!');
    }
}
