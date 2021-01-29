<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('home', compact('articles'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
