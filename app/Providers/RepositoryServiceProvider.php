<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\UserPasswordResetRepositoryInterface::class,
            \App\Repositories\Eloquent\UserPasswordResetRepository::class
        );

        $this->app->singleton(
            \App\Repositories\AdminUserRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminUserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\AdminUserRoleRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminUserRoleRepository::class
        );

        $this->app->singleton(
            \App\Repositories\AdminPasswordResetRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminPasswordResetRepository::class
        );

        $this->app->singleton(
            \App\Repositories\FileRepositoryInterface::class,
            \App\Repositories\Eloquent\FileRepository::class
        );

        $this->app->singleton(
            \App\Repositories\UserServiceAuthenticationRepositoryInterface::class,
            \App\Repositories\Eloquent\UserServiceAuthenticationRepository::class
        );

        $this->app->singleton(
            \App\Repositories\LessonRepositoryInterface::class,
            \App\Repositories\Eloquent\LessonRepository::class
        );

        $this->app->singleton(
            \App\Repositories\LessonScheduleRepositoryInterface::class,
            \App\Repositories\Eloquent\LessonScheduleRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ReviewRepositoryInterface::class,
            \App\Repositories\Eloquent\ReviewRepository::class
        );

        $this->app->singleton(
            \App\Repositories\AffiliateRepositoryInterface::class,
            \App\Repositories\Eloquent\AffiliateRepository::class
        );


        $this->app->singleton(
            \App\Repositories\FavoriteRepositoryInterface::class,
            \App\Repositories\Eloquent\FavoriteRepository::class
        );

        $this->app->singleton(
            \App\Repositories\HistoryRepositoryInterface::class,
            \App\Repositories\Eloquent\HistoryRepository::class
        );
    }
}
