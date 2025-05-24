<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileOptimization;

class MobileOptimizationController extends Controller
{
    /**
     * Store mobile optimization settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_mobile_optimization' => 'required|boolean',
            'supported_devices' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            MobileOptimization::saveSettings($validatedData);
            return response()->json(['message' => 'Mobile optimization settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save mobile optimization settings.', 'error' => $e->getMessage()], 500);
        }
    }
}