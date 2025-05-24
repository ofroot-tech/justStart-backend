<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseTracking;

class ExpenseTrackingController extends Controller
{
    /**
     * Store expense tracking data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'expense_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'associated_invoice' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            ExpenseTracking::saveExpense($validatedData);
            return response()->json(['message' => 'Expense tracked successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to track expense.', 'error' => $e->getMessage()], 500);
        }
    }
}