<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringInvoice extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'recurring_invoices';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'enable_recurring',
        'frequency',
        'start_date',
        'end_date',
        'notes',
    ];

    /**
     * Save recurring invoice settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}