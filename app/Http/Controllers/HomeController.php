<?php

namespace App\Http\Controllers;

use App\Apple;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * @return string
     */
    public function getHome()
    {
        $users = User::all();
        $basketApples = app('apples.repo')->getFreeApples();

        return view('site.home', [
            'users' => $users,
            'basketApples' => $basketApples,
        ]);
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getTakeApple($user_id)
    {
        \Log::info("apple grabbed by {$user_id}");

        $model = User::query()->find($user_id);
        $appleModel = Apple::getFreeApple();

        if ($appleModel)
        {
            $model->takeApple($appleModel);
        }

        return redirect('/');
    }


    /**
     * @return string
     */
    public function getFreeApples()
    {
        \Log::info("freedom");

        Apple::query()->update(['user_id' => null]);
        return redirect('/');
    }


}
