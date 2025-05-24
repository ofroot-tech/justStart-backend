<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceTracking;

class InvoiceTrackingController extends Controller
{
    /**
     * Store invoice tracking settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_tracking' => 'required|boolean',
            'notify_on_view' => 'required|boolean',
            'notify_on_payment' => 'required|boolean',
            'notify_on_overdue' => 'required|boolean',
        ]);

        try {
            InvoiceTracking::saveSettings($validatedData);
            return response()->json(['message' => 'Invoice tracking settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save invoice tracking settings.', 'error' => $e->getMessage()], 500);
        }
    }
}