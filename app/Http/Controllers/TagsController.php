<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tags = Tags::all();
            return response()->json($tags);
        } catch (\Exception $th) {
            return response()->json(["Erreur : "=> $th->getMessage()]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $tag = Tags::create([
            'name'=> $validated['name'],
            'description' => $request->description
        ]);
    }


    public function show(Tags $tags)
    {
        return response()->json($tags);
    }


    public function update(Request $request, Tags $tags)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
            ]);
            
            $tags ->update([
                'name'=> $validated['name'],
                'description' => $request->description
            ]);
    
            return response()->json(['tags'=> $tags]);
        } catch (\Exception $th) {
            return response()->json(['Erreur : '=> $th->getMessage()]);
        }
       
    }


    public function destroy(Tags $tags)
    {
        try {
            $tags->delete();
            return response()->json([
                'tags'=> $tags
            ]);
        } catch (\Exception $th) {
            return response()->json(['Erreur : '=> $th->getMessage()]);
        }
    }
}
