<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\BlockedEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Extending validation rules with custom one
        Validator::extend('not_in_blocked_emails_list', function ($attribute, $value, $parameters, $validator) {
            return collect(BlockedEmail::where('email', $value)->first())->isEmpty();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
