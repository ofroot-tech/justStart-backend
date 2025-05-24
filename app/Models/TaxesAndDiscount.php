<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'service_histories';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'customer_id',
        'service_name',
        'date_range_start',
        'date_range_end',
    ];

    /**
     * Retrieve service history based on the provided filters.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getHistory(array $filters)
    {
        $query = self::query();

        if (!empty($filters['customer_id'])) {
            $query->where('customer_id', $filters['customer_id']);
        }

        if (!empty($filters['service_name'])) {
            $query->where('service_name', 'like', '%' . $filters['service_name'] . '%');
        }

        if (!empty($filters['date_range_start'])) {
            $query->where('date', '>=', $filters['date_range_start']);
        }

        if (!empty($filters['date_range_end'])) {
            $query->where('date', '<=', $filters['date_range_end']);
        }

        return $query->get();
    }
}