<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileOptimization extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'mobile_optimizations';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'enable_mobile_optimization',
        'supported_devices',
        'notes',
    ];

    /**
     * Save mobile optimization settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}