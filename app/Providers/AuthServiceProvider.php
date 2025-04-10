<?php

namespace App\Providers;

use App\Models\Contact;
use App\Policies\ContactPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Contact::class => ContactPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-contact', function () {
            return auth()->check();
        });

        Gate::define('edit-contact', function () {
            return auth()->check();
        });

        Gate::define('delete-contact', function () {
            return auth()->check();
        });
    }
}
