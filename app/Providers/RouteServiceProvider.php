<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapParentRoutes();

        $this->mapInstructurRoutes();
        
        $this->mapStudentRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace . '\Backend')
            ->prefix('admin')
            ->name('admin.')
            ->group(base_path('routes/admin.php'));
    }
    /**
     * Define the "instructur" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapInstructurRoutes()
    {
        Route::middleware('web', 'auth', 'role:instructur')
            ->namespace($this->namespace . '\Instructur')
            ->prefix('instructur')
            ->name('instructur.')
            ->group(base_path('routes/instructur.php'));
    }
    /**
     * Define the "parent" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapParentRoutes()
    {
        Route::middleware('web', 'auth', 'role:parent')
            ->namespace($this->namespace . '\Parent')
            ->prefix('parent')
            ->name('parent.')
            ->group(base_path('routes/parent.php'));
    }
    /**
     * Define the "student" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStudentRoutes()
    {
        Route::middleware('web', 'auth', 'role:student')
            ->namespace($this->namespace . '\Student')
            ->prefix('student')
            ->name('student.')
            ->group(base_path('routes/student.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
