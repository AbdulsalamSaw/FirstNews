<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Category;
use App\Models\Article;
use Log;

class IndexController extends Controller
{
    public function viewPage()
    {
        try {
            $direction = (App::getLocale() == 'ar') ? 'rtl' : 'ltr';

            // Retrieve all categories
            $categories = Category::all();

            // Retrieve the latest articles
            $latestArticles = Article::latest()->take(10)->get();

            // Fetch latest news
            $latestNews = Article::take(5)->get();

            return view('homepage.app', compact('direction', 'categories', 'latestArticles', 'latestNews'));
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error('An error occurred in viewPage: ' . $e->getMessage());

            // Handle the error gracefully, e.g., by redirecting or showing an error page
           // return view('error')->with('error', 'An error occurred while fetching data for the page.');
           abort(404);


        }
    }

    public function viewSingleNew($id)
    {
        try {
            $direction = (App::getLocale() == 'ar') ? 'rtl' : 'ltr';

            $thisNews = Article::where('id',$id)->get();
            $title= $thisNews[0]->title;
            $category_id=$thisNews[0]->category_id;

            $articles = Article::where('category_id',$category_id)
                ->latest()
                ->take(5)
                ->get();

            $relatedNews = Article::where('category_id',$category_id)->take(6)
            ->get();

            $newCategory = Category::latest()
                ->take(5)
                ->get();


            return view('homepage.categories.singleNews', compact('direction', 'title','articles','newCategory','relatedNews','thisNews'));
        } catch (\Exception $e) {
            Log::error('An error occurred in viewCategories: ' . $e->getMessage());

            //return redirect()->back()->with('error', 'An error occurred while fetching the category.');
            abort(404);


        }
    }




}
