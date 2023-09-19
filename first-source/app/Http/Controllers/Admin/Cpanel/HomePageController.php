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
use App\Models\Visitor;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;

class HomePageController extends Controller
{


    public function viewPage()
    {
        $direction = (app()->getLocale() == 'ar') ? 'rtl' : 'ltr';
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $visitorsCount =Visitor::count();
        $chart_user = $this->userChart();
        $chart_visitor = $this->visitorChart();
        $chart_article = $this->articleChart();
        $chart_category = $this->categoryChart();
        return view('admin.home.index',compact(
            'visitorsCount', 'articlesCount',
            'categoriesCount', 'usersCount',
            'chart_user','chart_visitor',
            'chart_article','chart_category',

        ));

    }

    public function userChart()
    {
        $chart_user = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30,

        ];
        return  $charts_user= new LaravelChart($chart_user);

    }

    public function visitorChart()
    {
        $visitor = [
            'chart_title'=>'Visitors by day',
            'report_type'=>'group_by_date',
            'model'=>'App\Models\Visitor',
            'group_by_field'=>'visited_at',
            'group_by_period'=>'day',
            'chart_type'=>'line',

        ];
        return  $chart= new LaravelChart($visitor);

    }

    public function categoryChart()
    {
        $category = [
            'chart_title'=>'Category by day',
            'report_type'=>'group_by_date',
            'model'=>'App\Models\Category',
            'group_by_field'=>'created_at',
            'group_by_period'=>'day',
            'chart_type'=>'bar',

        ];
        return  $chart= new LaravelChart($category);

    }


    public function articleChart()
    {
        $article = [
            'chart_title'=>'Article by day',
            'report_type'=>'group_by_date',
            'model'=>'App\Models\Article',
            'group_by_field'=>'created_at',
            'group_by_period'=>'day',
            'chart_type'=>'bar',

        ];
        return  $chart= new LaravelChart($article);

    }



}
