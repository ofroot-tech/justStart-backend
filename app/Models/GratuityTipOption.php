<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GratuityTipsOption extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'gratuity_tips_options';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'enable_tips',
        'default_tip_percentage',
        'custom_tip_allowed',
    ];

    /**
     * Save gratuity/tips settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}