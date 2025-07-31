<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Room;
use App\Models\Roomtype;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot(): void
    {
        view()->composer('*', function ($view) {
          
            $roomtypes = Roomtype::where('status', 0)->get();
           $rooms = Room::where('status', 1)->with('roomType')->get();
            $view->with([
                'header_rooms' => $rooms,
                'header_roomtypes' => $roomtypes
                
            ]);
        });
    }

}
