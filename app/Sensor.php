<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sensors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'x_axis',
        'y_axis'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * Get list of nearby sensors and distance for each one.
     *
     * @param int $id
     * @param float|int $max_distance
     * @param int $sensor_limit
     * @return mixed
     */
    public static function nearby(int $id, float $max_distance = 20, int $sensor_limit = 20)
    {
        return DB::select('SELECT s2.*, (sqrt(power(s1.x_axis - s2.x_axis, 2) + power(s1.y_axis - s2.y_axis, 2))) AS distance
            FROM sensors AS s1, sensors AS s2
            WHERE s1.id <> s2.id
              AND s1.id = :id
              AND ( sqrt(power(s1.x_axis - s2.x_axis, 2) + power(s1.y_axis - s2.y_axis, 2)) ) < :max_distance
            ORDER BY distance ASC
            LIMIT :sensor_limit', [ 'id' => $id, 'max_distance' => $max_distance, 'sensor_limit' => $sensor_limit ]
        );
    }
}
