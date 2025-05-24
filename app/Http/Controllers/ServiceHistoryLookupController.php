<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceHistory;

class ServiceHistoryController extends Controller
{
    /**
     * Retrieve service history based on the provided filters.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function lookup(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'nullable|string|max:255',
            'service_name' => 'nullable|string|max:255',
            'date_range_start' => 'nullable|date',
            'date_range_end' => 'nullable|date|after_or_equal:date_range_start',
        ]);

        try {
            $serviceHistory = ServiceHistory::getHistory($validatedData);
            return response()->json(['data' => $serviceHistory, 'message' => 'Service history retrieved successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve service history.', 'error' => $e->getMessage()], 500);
        }
    }
}