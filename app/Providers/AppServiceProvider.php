<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $currentTime = Carbon::now();
        
        $setting = Setting::find(1);

        if ($currentTime->gt($setting->nomination_start_date) && $currentTime->lt($setting->nomination_end_date) ) {
            // returns true if current time is within the nomination period
            View::share('isWithinNominationPeriod', 'YES');
        }
        else
        {
            View::share('isWithinNominationPeriod', 'NO');
        }

        if ($currentTime->gt($setting->voting_start_date) && $currentTime->lt($setting->voting_end_date) ) {
            // returns true if current time is within the voting period
            View::share('isWithinVotingPeriod', 'YES');
        }
        else
        {
            View::share('isWithinVotingPeriod', 'NO');
        }
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
