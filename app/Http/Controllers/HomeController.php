<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        
        if (Auth::check()) {
            return $this->redirect();
        } else {
            $product=Product::paginate(3);
            return view('home.userpage',compact('product'));
        }
    }

    public function redirect()
    {
       
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.home');
            } else {
                return view('home.userpage');
            }
        } else {
            // User is not authenticated, handle accordingly
            return redirect()->route('login'); 
        }
    }
}

