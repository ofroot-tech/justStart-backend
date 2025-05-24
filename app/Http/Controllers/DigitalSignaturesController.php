<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DigitalSignature;

class DigitalSignatureController extends Controller
{
    /**
     * Store digital signature settings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enable_signatures' => 'required|boolean',
            'signature_type' => 'required|string|in:draw,type,upload',
            'instructions' => 'nullable|string|max:500',
        ]);

        try {
            DigitalSignature::saveSettings($validatedData);
            return response()->json(['message' => 'Digital signature settings saved successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save digital signature settings.', 'error' => $e->getMessage()], 500);
        }
    }
}