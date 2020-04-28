<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Observers\LessonObserver;
use App\Repositiroes\Contracts\CategoryRepositoryInterface;
use App\Repositiroes\Eloquent\CategoryRepository;
use App\Services\Bands\Contracts\MessagingInterface;
use App\Bands\Messaging\TelegramMessagingService;
use App\Caching\Categories\CategoryCache;
use App\Models\Category;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\UserObserver;
use App\Repositiroes\Contracts\BandRepositoryInterface;
use App\Repositiroes\Contracts\BatchRepositoryInterface;
use App\Repositiroes\Contracts\GroupRepositoryInterface;
use App\Repositiroes\Contracts\LessonRepositoryInterface;
use App\Repositiroes\Contracts\PostRepositoryInterface;
use App\Repositiroes\Contracts\TicketRepositoryInterface;
use App\Repositiroes\Contracts\UserRepositoryInterface;
use App\Repositiroes\Eloquent\BandRepository;
use App\Repositiroes\Eloquent\BatchRepository;
use App\Repositiroes\Eloquent\GroupRepository;
use App\Repositiroes\Eloquent\LessonRepository;
use App\Repositiroes\Eloquent\PostRepository;
use App\Repositiroes\Eloquent\TicketRepository;
use App\Repositiroes\Eloquent\UserRepository;
use App\Support\Points\Contracts\PointHandler;
use App\Support\Points\Contracts\PointHandlerInterface;
use App\Support\Points\LocalPointHandler;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
//    '\App\Repositories\Contracts\TicketRepositoryInterface',
//    '\App\Repositories\Eloquent\TicketRepository'
            TicketRepositoryInterface::class, TicketRepository::class
        );

        $this->app->bind(
            BandRepositoryInterface::class, BandRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class, CategoryRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class, UserRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class, PostRepository::class
        );

        $this->app->bind(
            PointHandler::class, LocalPointHandler::class
        );

        $this->app->bind(
            LessonRepositoryInterface::class, LessonRepository::class
        );

        $this->app->bind(
            GroupRepositoryInterface::class, GroupRepository::class
        );

        $this->app->bind(
            BatchRepositoryInterface::class, BatchRepository::class
        );

        $this->app->bind(
            MessagingInterface::class, TelegramMessagingService::class
        );
        $this->app->bind(
            PointHandlerInterface::class, LocalPointHandler::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production' || env('APP_ENV') === 'dev') {
            \URL::forceScheme('https');
        }

        User::observe(UserObserver::class);
        Lesson::observe(LessonObserver::class);
        Category::observe(CategoryObserver::class);

        Blade::if('instructor', function () {
            return auth()->user()->isInstructor();
        });

        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();

        view()->composer('*', function ($view){
            if(auth()->user()){
                return $view->with(['band' => auth()->user()->band]);
            }
        });

        view()->composer('*', function ($view){
            if($user = auth()->user()){
                $categories = app(CategoryCache::class)->inBand($user->band_id);
                $categories->map(function ($category) {
                    return [
                        'id' => $category->id,
                        'slug' => $category->slug,
                        'name' => $category->name,
                    ];
                });
                return $view->with(['categories' => $categories]);
            }
        });
    }
}
