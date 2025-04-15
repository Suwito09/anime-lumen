<?php

namespace App\Http\Controllers;

use App\Models\Tayang;
use App\Models\Anime;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TayangControllers extends Controller
{
    public function index()
    {
        $tayang = Tayang::with(['anime', 'studio'])->get();
        return response()->json([
            'success' => true,
            'message' => 'List of Tayang',
            'data' => $tayang
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anime_id' => 'required|exists:anime,id',
            'studio_id' => 'required|exists:studio,id',
            'jadwal_tayang' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All fields are required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $tayang = Tayang::create([
                'anime_id' => $request->input('anime_id'),
                'studio_id' => $request->input('studio_id'),
                'jadwal_tayang' => $request->input('jadwal_tayang')
            ]);
        }

        if ($tayang) {
            return response()->json([
                'success' => true,
                'message' => 'Tayang created successfully',
                'data' => $tayang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create tayang',
                'data' => 'error'
            ], 500);
        }
    }
}

