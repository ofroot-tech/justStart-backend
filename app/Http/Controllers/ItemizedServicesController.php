<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemizedService;

class ItemizedServiceController extends Controller
{
    /**
     * Store an itemized service.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            ItemizedService::saveService($validatedData);
            return response()->json(['message' => 'Itemized service added successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add itemized service.', 'error' => $e->getMessage()], 500);
        }
    }
}