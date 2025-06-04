<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Meta; // Change to your actual model

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Attach data to 'layouts.header' view
        View::composer('admin.layouts.header', function ($view) {
            $meta = Meta::first(); // Or however you fetch from DB
             $view->with([
                'metaTitle' => $meta->title ?? 'Default Title',
                'metaDescription' => $meta->value ?? 'Default Description',
                // 'metaTags' => $meta->tags ?? 'default,keywords',
            ]);
        });
    }

    public function register()
    {
        // You can leave this empty for now
    }
}
