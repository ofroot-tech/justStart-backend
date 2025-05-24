<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateToInvoice extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'estimates_to_invoices';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'estimate_id',
        'invoice_date',
        'notes',
    ];

    /**
     * Save estimate-to-invoice conversion data.
     *
     * @param array $data
     * @return self
     */
    public static function saveConversion(array $data)
    {
        return self::create($data);
    }
}