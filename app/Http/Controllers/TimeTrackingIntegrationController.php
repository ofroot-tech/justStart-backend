<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTrackingIntegration;

class TimeTrackingIntegrationController extends Controller
{
    /**
     * Store time tracking settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_time_tracking' => 'required|boolean',
            'hourly_rate' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            TimeTrackingIntegration::saveSettings($validatedData);
            return response()->json(['message' => 'Time tracking settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save time tracking settings.', 'error' => $e->getMessage()], 500);
        }
    }
}