<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Story;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){
            $myStory = Story::where('client_id',session('client_id'))->orderBy('id','DESC')->get();
            $allStories = Story::all() ? Story::all()->sortByDesc('id')->where('status','=','active') : null;
            $client =session('client_id') ? Client::where('id',session('client_id'))->first() : null;
            $adminStories = Story::all() ? Story::all() : null;
            $view->with('myStories', $myStory);
            $view->with('client', $client);
            $view->with('allStories', $allStories);
            $view->with('adminStories', $adminStories);
        });
    }
}
