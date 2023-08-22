<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function viewPage()
    {  
       
        $direction = (App::getLocale() == 'ar') ? 'rtl' : 'ltr';
        return view('home.index', compact('direction'));
        
    }
}
