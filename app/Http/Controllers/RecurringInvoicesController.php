<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecurringInvoice;

class RecurringInvoiceController extends Controller
{
    /**
     * Store recurring invoice settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_recurring' => 'required|boolean',
            'frequency' => 'required|string|in:weekly,biweekly,monthly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            RecurringInvoice::saveSettings($validatedData);
            return response()->json(['message' => 'Recurring invoice settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save recurring invoice settings.', 'error' => $e->getMessage()], 500);
        }
    }
}