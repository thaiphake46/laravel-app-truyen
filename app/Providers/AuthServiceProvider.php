<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\User;
use App\Policies\ChapterPolicy;
use App\Policies\StoryPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Story::class => StoryPolicy::class,
        Chapter::class => ChapterPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
