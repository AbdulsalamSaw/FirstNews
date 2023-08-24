<?php

namespace App\Http\Controllers\Admin\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class HomePageController extends Controller
{
    
   
    public function viewPage()
    {  
        $direction = (app()->getLocale() == 'ar') ? 'rtl' : 'ltr';
        
            return view('admin.home.index');

    }

  
    

}
