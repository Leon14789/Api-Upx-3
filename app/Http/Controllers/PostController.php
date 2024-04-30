<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request) {
       
        $midia = $request->file('midia');
        $pathMidia = $midia->store('public/Files');
        
        (new Post(
            [
                'title' => $request->title,
                'descripition' => $request->descripition,
                'midia' => $pathMidia
            ]
        ))->save();

       
       
    }

    public function index() {
        return Post::all();
    }
}
