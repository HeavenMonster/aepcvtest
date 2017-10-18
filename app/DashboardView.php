<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DashboardView
 *
 * @package App
 */
class DashboardView extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dashboard_view';

    public function getActiveUserAttribute($value)
    {
        $parts = explode(',', $value);

        if (count($parts) === 2) {
            return [
                'comments'  => $parts[0],
                'email'     => $parts[1]
            ];
        }

        return null;
    }
}
