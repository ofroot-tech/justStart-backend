<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalSignature extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'digital_signatures';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'enable_signatures',
        'signature_type',
        'instructions',
    ];

    /**
     * Save digital signature settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}