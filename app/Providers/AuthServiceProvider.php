<?php

namespace App\Providers;

use App\User;
use App\Models\Idea;
use App\Models\Actualite;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Idea::class => 'App\Policies\IdeaPolicy',
        Actualite::class => 'App\Policies\ActualitePolicy',
        User::class => 'App\Policies\AdminPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
