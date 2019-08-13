<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Menu;
use Storage;
use Illuminate\Support\Facades\Auth;//追加heroku
class MenuController extends Controller
{
   
   public function home() 
   {
       return view('home');
   }
    
    public function index(Request $request)
    {
     
    $cond_item = $request->cond_item;
    
        
        
            $menus= Menu::all()->sortBy('updated_at');

         return view('menu.index', [ 'menus' => $menus,'cond_item' => $cond_item]);
      
    }
}
