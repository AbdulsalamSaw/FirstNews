<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Category;
use App\Models\Article;

class IndexController extends Controller
{
    public function viewPage()
    {  
       
        $direction = (App::getLocale() == 'ar') ? 'rtl' : 'ltr';
        $categories = Category::all();
        $latestArticles = Article::latest()->take(10)->get();
        $latestNews = Article::take(5)->get(); // Fetch latest news

        return view('homepage.app', compact('direction', 'categories', 'latestArticles', 'latestNews'));
      
    }
}
