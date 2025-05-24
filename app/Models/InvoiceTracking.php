<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceTracking extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'invoice_tracking';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'enable_tracking',
        'notify_on_view',
        'notify_on_payment',
        'notify_on_overdue',
    ];

    /**
     * Save invoice tracking settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}