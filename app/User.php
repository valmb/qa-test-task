<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User apples relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apples()
    {
        return $this->hasMany(Apple::class);
    }

    /**
     * @return int
     */
    public function getApplesCount()
    {
        return Apple::query()->where('user_id', $this->id)->count();
    }


    /**
     * @param Apple|null $apple
     */
    public function takeApple($apple)
    {
        $mod = ($apple->id % 2 == 0) ? 1 : 0;
        $cnt = self::apples()->getQuery()->where(\DB::raw("id % 2"), $mod)->count();

        if ($cnt > 0)
        {
            Session::flash('alert-warning', 'You cant have apples with both odd and even ids, try again)');
            return false;
        }

        $apple->user_id = $this->id;
        $apple->save();
    }

}

