<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerInfoStorage;

class CustomerInfoStorageController extends Controller
{
    /**
     * Store customer information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            CustomerInfoStorage::saveCustomerInfo($validatedData);
            return response()->json(['message' => 'Customer information saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save customer information.', 'error' => $e->getMessage()], 500);
        }
    }
}