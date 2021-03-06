<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::personalAccessTokensExpireIn(Carbon::now()->addHours(24));
        Passport::tokensExpireIn(Carbon::now()->addHours(24));
        Passport::refreshTokensExpireIn(now()->addDays(7));
        Passport::tokensCan([
            'edit' => 'can edit books available',
            'create' => 'can add new books',
            'delete' => 'can delete books',
        ]);
        Passport::routes();
    }
}
