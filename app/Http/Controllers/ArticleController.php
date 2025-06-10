<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create() {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'stock_type' => 'required|string|max:50',
            'minimum_stock' => 'required|integer',
        ]);

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Artikel succesvol aangemaakt.');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'stock_type' => 'required|string|max:50',
            'minimum_stock' => 'required|integer',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel succesvol bijgewerkt.');
    }


    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
