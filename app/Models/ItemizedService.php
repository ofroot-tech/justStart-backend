<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemizedService extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'itemized_services';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'service_name',
        'service_description',
        'price',
    ];

    /**
     * Save itemized service.
     *
     * @param array $data
     * @return self
     */
    public static function saveService(array $data)
    {
        return self::create($data);
    }
}