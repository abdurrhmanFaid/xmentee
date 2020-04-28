<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Band' => 'App\Policies\BandPolicy',
        'App\Models\Ticket' => 'App\Policies\TicketPolicy',
        'App\Models\Batch' => 'App\Policies\BatchPolicy',
        'App\Models\Group' => 'App\Policies\GroupPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\User' => 'App\Policies\ProfilePolicy',
        'App\Models\Lesson' => 'App\Policies\LessonPolicy',
        'App\Models\Task' => 'App\Policies\TaskPolicy',
        'App\Models\Payment' => 'App\Policies\PaymentPolicy',
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
