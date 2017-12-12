<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Apple extends Model
{
    protected $table = 'apples';

    /**
     * Apple owner relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get a apple
     * @todo use a token bucket algorithm, something like https://github.com/bandwidth-throttle/token-bucket
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public static function getFreeApple()
    {
        $lastTaken = self::query()->orderBy('updated_at', 'desc')->first();
        if (time() - $lastTaken->updated_at->getTimestamp() < 60)
        {
            Session::flash('alert-warning', 'Basket cant give more than one apple per minute');
            return false;
        }

        $apple = self::query()->whereDoesntHave('user')->first();

        if ($apple === null)
        {
            Session::flash('alert-warning', 'Apple basket are empty');
            return false;
        }

        return $apple;
    }
}
