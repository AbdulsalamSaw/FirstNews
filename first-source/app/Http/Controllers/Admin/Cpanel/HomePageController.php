<?php

namespace App\Http\Controllers\Admin\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;

use DB;

class HomePageController extends Controller
{


    public function viewPage()
    {
        $direction = (app()->getLocale() == 'ar') ? 'rtl' : 'ltr';
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $visitorsCount = DB::table('visitors')->count();
        return view('admin.home.index',compact('visitorsCount', 'articlesCount', 'categoriesCount', 'usersCount'));

    }




}
