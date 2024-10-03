<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//IMPLMENTATIONS:
use App\Repositories\Logic\AdminLogic;
use App\Repositories\Logic\SchoolLogic;
use App\Repositories\Logic\TeacherLogic;

//INTERFACES:
use App\Repositories\Interfaces\AdminInterface;
use App\Repositories\Interfaces\SchoolInterface;
use App\Repositories\Interfaces\TeacherInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminInterface::class, AdminLogic::class);
        $this->app->bind(SchoolInterface::class, SchoolLogic::class);
        $this->app->bind(TeacherInterface::class, TeacherLogic::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
