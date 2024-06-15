<?php

namespace App\Http\Controllers\Admin\Cpanel;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Log;
use App\Models\Category;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try {
            $article = new Article([
                'title' => $request->input('title'),
                'user_id' => auth()->user()->id,
            ]);
            $article->category_id = $request->input('categorie_id');
            $article->content = $request->input('content');
    
            // Upload Image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('articles', 'public');
                $article->image = url('storage/' . $imagePath);
            }
    
            // Upload Video
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
                $article->video = url('storage/' . $videoPath);
            }
    
            $article->save();
    
            return redirect()->route('articles.index')->with('success', 'Article created successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while creating the article.');
        }
    }
    

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),

            ]);
           $article->category_id = $request->input('category_id');

            $article->save();
            return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while updating the article.');
        }
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();

            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while deleting the article.');
        }
    }
}
