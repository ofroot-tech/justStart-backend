<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepositRequest;

class DepositRequestController extends Controller
{
    /**
     * Store a deposit request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'deposit_amount' => 'required|numeric|min:0',
            'deposit_percentage' => 'nullable|numeric|min:0|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        try {
            DepositRequest::saveRequest($validatedData);
            return response()->json(['message' => 'Deposit request saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save deposit request.', 'error' => $e->getMessage()], 500);
        }
    }
}