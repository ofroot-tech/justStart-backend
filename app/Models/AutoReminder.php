<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoReminder extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'auto_reminders';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'reminder_type',
        'reminder_interval',
        'email_template',
        'sms_template',
    ];

    /**
     * Save auto reminder settings.
     *
     * @param array $data
     * @return self
     */
    public static function saveSettings(array $data)
    {
        return self::create($data);
    }
}