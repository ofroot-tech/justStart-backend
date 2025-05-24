<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerInfoStorage extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'customer_info_storage';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'address',
        'notes',
    ];

    /**
     * Save customer information.
     *
     * @param array $data
     * @return self
     */
    public static function saveCustomerInfo(array $data)
    {
        return self::create($data);
    }
}