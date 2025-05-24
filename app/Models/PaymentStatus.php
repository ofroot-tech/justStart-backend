<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'payment_statuses';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'payment_status',
        'notes',
    ];

    /**
     * Save payment status.
     *
     * @param array $data
     * @return self
     */
    public static function saveStatus(array $data)
    {
        return self::create($data);
    }
}