<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimeControllers extends Controller
{
    public function index()
    {
        $anime = Anime::all();
        return response()->json([
            'success' => true,
            'message' => 'List of Anime',
            'data' => $anime
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All fields are required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $anime = Anime::create([
                'judul' => $request->input('judul'),
                'genre' => $request->input('genre')
            ]);
        }

        if ($anime) {
            return response()->json([
                'success' => true,
                'message' => 'Anime created successfully',
                'data' => $anime
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create anime',
                'data' => 'error'
            ], 500);
        }
    } 

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'string|max:255',
            'genre' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All fields are required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $anime = Anime::whereId($id)->update ([
                'judul' => $request->input('judul'),
                'genre' => $request->input('genre')
            ]);
        }

        if ($anime) {
            return response()->json([
                'success' => true,
                'message' => 'Anime updated successfully',
                'data' => $anime
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update anime',
                'data' => 'error'
            ], 500);
        }
    }

    public function delete($id)
    {
        $anime = Anime::find($id);
        if ($anime) {
            $anime->delete();
            return response()->json([
                'success' => true,
                'message' => 'Anime deleted successfully',
                'data' => null
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anime not found',
                'data' => null
            ], 404);
        }
    }
}