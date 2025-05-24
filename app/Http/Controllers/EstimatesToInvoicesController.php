<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstimateToInvoice;

class EstimateToInvoiceController extends Controller
{
    /**
     * Store estimate-to-invoice conversion data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estimate_id' => 'required|string|max:255',
            'invoice_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            EstimateToInvoice::saveConversion($validatedData);
            return response()->json(['message' => 'Estimate successfully converted to invoice!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to convert estimate to invoice.', 'error' => $e->getMessage()], 500);
        }
    }
}