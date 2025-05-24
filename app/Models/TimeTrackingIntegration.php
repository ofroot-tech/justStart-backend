<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxesAndDiscounts;

class TaxesAndDiscountsController extends Controller
{
    /**
     * Store taxes and discounts settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tax_rate' => 'required|numeric|min:0|max:100',
            'discount_name' => 'nullable|string|max:255',
            'discount_amount' => 'nullable|numeric|min:0|max:100',
        ]);

        try {
            TaxesAndDiscounts::saveSettings($validatedData);
            return response()->json(['message' => 'Taxes and discounts saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save taxes and discounts.', 'error' => $e->getMessage()], 500);
        }
    }
}