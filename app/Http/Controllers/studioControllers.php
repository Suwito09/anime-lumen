<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studioControllers extends Controller
{
    public function index()
    {
        $studio = Studio::all();
        return response()->json([
            'success' => true,
            'message' => 'List of Studio',
            'data' => $studio
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studio_name' => 'required|string|max:255',
            'studio_location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All fields are required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $studio = Studio::create([
                'studio_name' => $request->input('studio_name'),
                'studio_location' => $request->input('studio_location')
            ]);
        }

        if ($studio) {
            return response()->json([
                'success' => true,
                'message' => 'Studio created successfully',
                'data' => $studio
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create studio',
                'data' => 'error'
            ], 500);
        }

    }

    public function update (Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'studio_name' => 'required|string|max:255',
            'studio_location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All fields are required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $studio = Studio::whereId($id)->update([
                'studio_name' => $request->input('studio_name'),
                'studio_location' => $request->input('studio_location')
            ]);
        }

        if ($studio) {
            return response()->json([
                'success' => true,
                'message' => 'Studio updated successfully',
                'data' => $studio
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update studio',
                'data' => error
            ], 500);
        }
    }

    public function delete($id)
    {
        $studio = Studio::find($id);
        if ($studio) {
            $studio->delete();
            return response()->json([
                'success' => true,
                'message' => 'Studio deleted successfully',
                'data' => null
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Studio not found',
                'data' => null
            ], 404);
        }
    }
} 