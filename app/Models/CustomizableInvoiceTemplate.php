<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomizableInvoiceTemplate extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'customizable_invoice_templates';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'business_name',
        'logo_url',
        'template_color',
    ];

    /**
     * Save customizable invoice template settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}