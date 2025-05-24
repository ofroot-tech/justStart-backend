<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentStatus;

class PaymentStatusController extends Controller
{
    /**
     * Store payment status.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment_status' => 'required|string|in:paid,unpaid,partially_paid,overdue',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            PaymentStatus::saveStatus($validatedData);
            return response()->json(['message' => 'Payment status updated successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update payment status.', 'error' => $e->getMessage()], 500);
        }
    }
}