<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GratuityTipsOption;

class GratuityTipsOptionController extends Controller
{
    /**
     * Store gratuity/tips settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_tips' => 'required|boolean',
            'default_tip_percentage' => 'nullable|numeric|min:0|max:100',
            'custom_tip_allowed' => 'required|boolean',
        ]);

        try {
            GratuityTipsOption::saveSettings($validatedData);
            return response()->json(['message' => 'Gratuity/Tips settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save gratuity/tips settings.', 'error' => $e->getMessage()], 500);
        }
    }
}