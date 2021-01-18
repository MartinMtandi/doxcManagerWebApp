<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        $popular = Document::where('no_of_downloads', '>', 0)->orderByDesc('no_of_downloads')->take(4)->get();
        $promo = Document::where('featured', '>', 0)->orderByDesc('created_at')->take(4)->get();
        $documents = Document::with(['user'])->latest()->paginate(10);
        return view("home", ['documents' => $documents, 'popular' => $popular, 'promo' => $promo]);
    }
}
