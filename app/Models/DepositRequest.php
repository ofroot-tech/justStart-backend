<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositRequest extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'deposit_requests';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'deposit_amount',
        'deposit_percentage',
        'description',
    ];

    /**
     * Save deposit request.
     *
     * @param array $data
     * @return self
     */
    public static function saveRequest(array $data)
    {
        return self::create($data);
    }
}