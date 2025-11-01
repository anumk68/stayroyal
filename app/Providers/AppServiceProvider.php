<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Room;
use App\Models\RoomCategory;
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
            // Get categories with room types and rooms
            $categories = RoomCategory::with(['roomTypes.rooms' => function ($q) {
                $q->where('status', 1);
            }])
                ->where('status', 1)
                ->get();

            $view->with([
                'header_categories' => $categories
            ]);
        });
    }
}
