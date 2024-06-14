<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class SearchController extends Controller
{
    public function index()
    {
        $latestArticles = Article::latest()->take(5)->get(); // Adjust the number as needed
        $categories = Category::all(); // Ensure categories are also passed

        return view('home', compact('latestArticles', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'like', "%$query%")
                           ->orWhere('content', 'like', "%$query%")
                           ->get();
                           
        $categories = Category::all();  // Fetch all categories
        $latestArticles = Article::latest()->take(5)->get(); // Adjust the number as needed

        return view('homepage.search_results', compact('articles', 'query', 'categories','latestArticles'));
    }
}
