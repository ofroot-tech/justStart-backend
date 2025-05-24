<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseTracking extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'expense_tracking';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'expense_name',
        'amount',
        'category',
        'associated_invoice',
        'notes',
    ];

    /**
     * Save expense tracking data.
     *
     * @param array $data
     * @return self
     */
    public static function saveExpense(array $data)
    {
        return self::create($data);
    }
}