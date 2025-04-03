<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleLikeRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id)
    {
        $a = Article::query()->findOrFail($id);

        $a->likes()->toggle([$request->user()->id]);
    }
}
