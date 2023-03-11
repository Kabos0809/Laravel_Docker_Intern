<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use app\Models\Thread;
use app\Models\Response;
use app\Policies\ThreadPolicy;
use app\Policies\ResponsePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Thread::class => ThreadPolicy::class,
        Response::class => ResponsePolicy::class,
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
