<?php

namespace App\Services\Apples;


use App\Apple;

class ApplesRepo
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Apple[]
     */
    public function getFreeApples()
    {
        return Apple::query()->whereDoesntHave('user')->get();
    }
}